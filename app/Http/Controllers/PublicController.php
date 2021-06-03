<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventsList;
use App\Models\Resources\Event;
use App\Models\FAQList;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\AdvancedSearchRequest;
use Carbon\Carbon;
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
     * Questo metodo ottiene gli eventi più vicini 
     */
    public function showHomePage()
    {
        $nearEvents = $this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }

    public function showEventsList()
    {
        $organizzatori = $this->eventsList->getOrganizzatori();
        $regions = $this->eventsList->getRegionList();
        $events = $this->eventsList->getEvents();
        $months = $this->eventsList->getMonthList();
        return view('list')->with('events', $events)->with('regions', $regions)->with('organizzatori', $organizzatori)
                ->with('months', $months);
    }

    public function showEventsListFiltered(AdvancedSearchRequest $request)
    {
        $organizzatori = $this->eventsList->getOrganizzatori();
        $regions = $this->eventsList->getRegionList();
        $months = $this->eventsList->getMonthList();
        $events = $this->eventsList->getEventsFiltered($request->year, $request->month, $request->reg, 
                $request->org, $request->desc);
        return view('list')->with('events', $events)->with('regions', $regions)->with('organizzatori', $organizzatori)
                ->with('months', $months);
    }

    private function checkOnSale($event)
    {
        $currentDate = Carbon::now();
        $eventDate = Carbon::parse($event->data);
        Log::debug($event);
        $diff = $eventDate->diffInDays($currentDate);
        Log::debug($diff);
        if ($diff <= $event->giornisconto) {
            return true;
        }
        return false;
    }

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
        $isOnSale = $this->checkOnSale($event);
        Log::debug("IS ON SALE");
        Log::debug($isOnSale == false);
        return view('event')->with('event', $event)->with('partecipa', $partecipa)->with('saldo', $isOnSale);
    }

    public function showInfo()
    {
        $FAQ = $this->FAQList->getFAQ();
        return view('faq')->with('FAQ', $FAQ);
    }
}
