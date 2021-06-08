<?php

namespace App\Http\Controllers;

use App\Models\Resources\Event;
use App\Models\Org;
use App\Models\EventsList;
use App\Http\Requests\AddEventRequest;
use App\Http\Requests\ModifyEventRequest;
use Illuminate\Support\Facades\File;

class OrgController extends Controller {

    protected $_orgModel;
    protected $eventsList;

    public function __construct() {
        $this->middleware('can:isOrg');
        $this->_orgModel = new Org;
        $this->eventsList = new EventsList;
    }

    /*
     * Questa funzione ottiene l'utente oganizzatore e gli eventi da esso organizzati,
     * per poi ritornare la vista dell'area riservata dell'utente
     */

    public function AreaRiservata() {
        $user = auth()->user();
        $events = $this->_orgModel->getNearOrgEvents($user->organizzazione);
        return view('org')->with('user', $user)->with('events', $events);
    }

    /*
     * Questa funzione restituisce la vista per la creazione di un nuovo evento
     */

    public function showNewEventScreen() {
        $regions = $this->eventsList->getRegionList();
        return view('newevent')->with('regions', $regions);
    }

    /*
     * Questa funzione modifica la stringa che contiene i dati del luogo dell'evento
     * per poter inserire nella mappa nella pagina dell'evento
     *
     * @param str è la stringa da modificare
     */

    function encodeURIComponent($str) {
        $revert = array('%21' => '!', '%2A' => '*', '%27' => "'", '%28' => '(', '%29' => ')');
        return strtr(rawurlencode($str), $revert);
    }

    /*
     * Questa funzione richiede l'inserimento nel db dei dati di un nuovo evento, dopo aver elaborato quelli sulla locazione e dopo
     * aver gestito l'immagine caricata dall'utente organizzatore
     *
     * @param $request è il risultato della submit della form di aggiunta evento
     */

    public function addEvent(AddEventRequest $request) {
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = 'default.png';
        }
        $luogo = ($request->indirizzo) . ', ' . ($request->numciv) . ', ' . ($request->città) . ' ' . ($request->provincia);
        $event = new Event();
        $event->fill($request->validated());
        $event->urlluogo = 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=' . $this->encodeURIComponent($luogo) . "&output=embed";
        $event->immagine = $imageName;
        $event->bigliettivenduti = 0;
        $event->parteciperò = 0;
        $event->nomeorganizzatore = auth()->user()->organizzazione;
        $event->save();
        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/locandine';
            $image->move($destinationPath, $imageName);
        }
        return response()->json(['redirect' => route('areariservata.org')]);
    }

    /*
     * Questa funzione richiede la modifica dei dati di un evento all'interno del DB. La gestione del luogo e della immagine
     * è analoga all'aggiunta dell'evento
     *
     * @param $request è il risultato della submit della form di modifica
     * @param $eventId è l'id dell'evento da modificare, da passare in quanto non presente in $request
     */

    public function storeModifiedEvent(ModifyEventRequest $request, $eventId) {
        $event = $this->eventsList->getEventById($eventId);
        if (($request->hasFile('imm')) && ($request->file('imm')->getClientOriginalName() != $event->immagine)) {
            $imageName = $request->file('imm')->getClientOriginalName();
            $image = $request->file('imm');
            if (!is_null($imageName)) {
                $destinationPath = public_path() . '/locandine';
                $image->move($destinationPath, $imageName);
            }
            $event->immagine = $imageName;
        }
        $luogo = ($request->indirizzo) . ', ' . ($request->numciv) . ', ' . ($request->città) . ' ' . ($request->provincia);
        $event->fill($request->validated());
        $event->urlluogo = 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=' . $this->encodeURIComponent($luogo) . "&output=embed";
        $event->save();
        return response()->json(['redirect' => route('areariservata.org')]);
    }

    /**
     * Recupera gli eventi organaizzati dall'organizzatore loggato. Inoltre, qualora si richiede la
     * cancellazione di un evento passa alla view anche il risultato della cancellazione.
     *
     * @param $result Il risultato della cancellazione dell'evento
     */
    public function EventiOrganizzati($result = null) {
        $org = auth()->user();
        $events = $this->_orgModel->getOrgEvents($org->organizzazione);
        if ($result == null) {
            return view('org_events_list')->with('events', $events);
        }
        return view('org_events_list')->with('events', $events)->with('result', $result);
    }

    /**
     * Chiama una funzione in Org Model che elimina l'evento passato comen parametro eliminando, qualora esistesse anche l'immagine ad esso associata.
     * Poi chiama la funzione EventiOrganizzati passandole il risultato dell'eliminazione
     *
     * @param $eventId L'id dell'evento da eliminare
     */
    public function EliminaEvento($eventId) {
        $event = $this->eventsList->getEventById($eventId);
        if (isset($event)) {
            $result = $this->_orgModel->EliminaEvento($eventId);
            $imagePath = public_path() . '/locandine/' . $event->immagine;
            if (File::exists($imagePath) && $event->immagine !== "default.png") {
                File::delete($imagePath);
            }
        }
        return redirect()->action('OrgController@EventiOrganizzati', ['result' => $result]);
    }

    public function showEventsListManaged($request = null) {
        $org = auth()->user();
        $events = $this->eventsList->getEventsManaged($org->organizzazione);
        if ($request == null) {
            return view('list')->with('events', $events);
        }
    }

    /**
     * Prende l'evento da modificare nel database e richiame la funzione per mostrare la form dell'evento
     *
     * @param $eventId L'id dell'evento da modificare
     */
    public function modifyEvent($eventId) {
        $event = $this->eventsList->getEventById($eventId);
        $regions = $this->eventsList->getRegionList();
        return view('newevent')->with('event', $event)->with('regions', $regions);
    }

    public function getProvince($regione) {
        $prov = $this->eventsList->getProv($regione);
        $response = [];
        $i = 0;
        foreach ($prov as $p) {
            $response[$i] = $p;
            $i++;
        }
        return response()->json($response);
    }

}
