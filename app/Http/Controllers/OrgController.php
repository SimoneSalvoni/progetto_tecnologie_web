<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Resources\Event;
use App\Models\Org;
use App\Models\EventsList;
use App\Http\Requests\NewEventRequest;
use Illuminate\Support\Facades\Log;

class OrgController extends Controller
{

    protected $_orgModel;
    protected $eventsList;

    public function __construct()
    {
        $this->middleware('can:isOrg');
        $this->_orgModel = new Org;
        $this->eventsList = new EventsList;
    }

    public function AreaRiservata()
    {
        $user = auth()->user();
        //  $nearEvents = ;
        //TODO creare la view dello user
        $events = $this->eventsList->getEventsManaged($user->organizzazione);

        return view('org')->with('user', $user)->with('events', $events);
    }

    /*
     * Qui mettiamo di default l'attributo dell'evento
     * che specifica il nome dell'organizzazione
     */

    public function showNewEventScreen($event = null)
    {
        if ($event == null) {
            return view('newevent');
        }
        return view('newevent')->with('event', $event);
    }

    public function addEvent(NewEventRequest $request)
    {
        function encodeURIComponent($str)
        {
            $revert = array('%21' => '!', '%2A' => '*', '%27' => "'", '%28' => '(', '%29' => ')');
            return strtr(rawurlencode($str), $revert);
        }
        Log::debug($request->all());
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = 'concert.jpg';
        }
        $luogo = ($request->indirizzo) . ', ' . ($request->numciv) . ', ' . ($request->città) . ' ' . ($request->provincia);

        $event = new Event();
        $event->fill($request->validated());
        $event->urlluogo = 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=' . encodeURIComponent($luogo) . "&output=embed";
        $event->immagine = $imageName;
        $event->bigliettivenduti = 0;
        $event->parteciperò = 0;
        $event->nomeorganizzatore = auth()->user()->organizzazione;
        $event->città = $request->città;
        $event->comeraggiungerci = $request->comeraggiungerci;
        $event->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/locandine';
            $image->move($destinationPath, $imageName);
        }
        return redirect()->route('areariservata.org');
    }

    /**
     * Recupera gli eventi organaizzati dall'organizzatore loggato. Inoltre, qualora si richiede la
     * cancellazione di un evento passa alla view anche il risultato della cancellazione.
     *
     * @param $result Il risultato della cancellazione dell'evento
     */
    public function EventiOrganizzati($result = null)
    {
        $org = auth()->user();
        $events = $this->_orgModel->getOrgEvents($org->organizzazione);
        if ($result == null) {
            return view('org_events_list')->with('events', $events);
        }
        return view('org_events_list')->with('events', $events)->with('result', $result);
    }

    /**
     * Chiama una funzione in Org Model che elimina l'evento passato comen parametro. Poi chiama la funzione EventiOrganizzati
     * passandole il risultato dell'eliminazione
     *
     * @param $event L'evento da eliminare
     */
    public function EliminaEvento($event)
    {
        $result = $this->_orgModel->EliminaEvento($event);
        return redirect()->action('OrgController@EventiOrganizzati', ['result' => $result]);
    }

    public function showEventsListManaged($request = null)
    {
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
    public function modifyEvent($eventId)
    {
        $event = $this->eventsList->getEventById($eventId);
        return redirect()->action('OrgController@showNewEventScreen', ['event', $event]);
    }
}
