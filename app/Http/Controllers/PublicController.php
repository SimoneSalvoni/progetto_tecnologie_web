<?php

namespace App\Http\Controllers;

use App\Models\EventsList;
use App\Models\FAQList;
use App\Http\Requests\AdvancedSearchRequest;
use Exception;

class PublicController extends Controller
{
    protected $eventsList;
    protected $FAQList;

    public function __construct()
    {
        $this->eventsList = new EventsList;
        $this->FAQList = new FAQList;
    }

    /*
     * Questa funzione ottiene gli eventi più vicini alla data odierna
     */
    public function showHomePage()
    {
        $nearEvents = $this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }

    /*
     * Questa funzione raccoglie i dati necessari per mostrare la lista di tutti gli eventi, paginati per 
     * facilitarne la fruizione. Ottiene anche la lista degli organizzatori, dei mesi e delle regioni per 
     * costruire la form. Controlla inoltre per ogni evento se esso è scontato. 
     */
    public function showEventsList()
    {
        $organizzatori = $this->eventsList->getOrganizzatori();
        $regions = $this->eventsList->getRegionList();
        $events = $this->eventsList->getEvents();
        $EventsOnSales = array();
        foreach ($events as $event){
           $EventsOnSales[$event->id] = $this->eventsList->checkOnSale($event);
        }
        $months = $this->eventsList->getMonthList();
        return view('list')->with('events', $events)->with('regions', $regions)->with('organizzatori', $organizzatori)
                ->with('months', $months)->with('OnSales', $EventsOnSales);
    }

    /*
     * Questa funzione raccoglie i dati necessari per mostrare la lista di tutti gli eventi filtrati secondo
     * i parametri richeisti dall'utente. Per il resto si comporta allo stesso modo della funzione precedente
     * 
     * @param $request è il risultato della submit della form di rircerca
     */
    public function showEventsListFiltered(AdvancedSearchRequest $request)
    {
        $organizzatori = $this->eventsList->getOrganizzatori();
        $regions = $this->eventsList->getRegionList();
        $months = $this->eventsList->getMonthList();
        $events = $this->eventsList->getEventsFiltered($request->year, $request->month, $request->reg,
                $request->org, $request->desc);
        $EventsOnSales = array();
        foreach ($events as $event){
           $EventsOnSales[$event->id] = $this->eventsList->checkOnSale($event);
        }
        return view('list')->with('events', $events)->with('regions', $regions)->with('organizzatori', $organizzatori)
                ->with('months', $months)->with('OnSales', $EventsOnSales);
    }


    /*
     * Questa funzione ottiene i dati necessari per mostrare la pagina di un evento, controllando anche 
     * se l'utente di livello 2 ha già scelto di partecipare all'evento in questione.
     * 
     * @param $eventId è l'id dell'evento da mostrare
     */
    public function showEvent($eventId)
    {
        try {
            $user = auth()->user();
            if ($user !== null) {
                $partecipa = $user->hasPart($user->nomeutente, $eventId);
            } else {
                $partecipa = false;
            }
        } catch (Exception $e) {
            $partecipa = false;
        }
        //Trovo se l'evento è in sconto oppure no
        $event = $this->eventsList->getEventById($eventId);
        $isOnSale = $this->eventsList->checkOnSale($event);
        return view('event')->with('event', $event)->with('partecipa', $partecipa)->with('saldo', $isOnSale);
    }

    
    /*
     * Questa funziona ottiene la lista delle faq per passarle alla vista
     */
    public function showInfo()
    {
        $FAQ = $this->FAQList->getFAQ();
        return view('faq')->with('FAQ', $FAQ);
    }
    
}
