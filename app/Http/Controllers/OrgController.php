<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Resources\Event;
use App\Models\Org;
use App\Models\EventsList;
use App\Http\Requests\NewEventRequest;

class OrgController extends Controller {

    protected $_orgModel;
    protected $eventsList;

    public function __construct() {
        $this->middleware('can:isOrg');
        $this->_orgModel = new Org;
        $this->eventsList = new EventsList;
    }

    public function AreaRiservata() {
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

    public function showNewEventScreen() {
        $nomeOrg = $this->_orgModel->getOrg()->pluck('organizzazione');
        return view('newevent')
                        ->with('organizzazione', $nomeOrg);
    }

    //Qua va capito meglio il funzionamento della store
    public function addEvent(NewEventRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }
        $luogo = ($request->indirizzo) . ', ' . ($request->numciv) . ', ' . ($request->città) . ' ' . ($request->provincia);

        $product = new Product;
        $product->fill($request->validated());
        $product->urlluogo = 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=' . encodeURIComponent($luogo) . "&output=embed";
        $product->image = $imageName;
        $product->bigliettivenduti = 0;
        $product->parteciperò = 0;
        $product->nomeorganizzazione = auth()->user()->organizzazione;
        $product->save();

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
    public function EventiOrganizzati($result = null) {
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
    public function EliminaEvento($event) {
        $result = $this->_orgModel->EliminaEvento($event);
        return redirect()->action('OrgController@EventiOrganizzati', ['result' => $result]);
    }

    public function showEventsListManaged($request = null) {
        $org = auth()->user();
        $events = $this->eventsList->getEventsManaged($org->organizzazione);
        if ($request == null) {
            return view('list')->with('events', $events);
        }
    }

}
