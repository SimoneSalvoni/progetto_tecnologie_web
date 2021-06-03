<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventsList;
use App\Models\Resources\Event;
use App\Models\FAQList;
use Illuminate\Support\Facades\Log;
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
        return view('list')->with('events', $events)->with('regions', $regions)->with('organizzatori', $organizzatori);
    }

    public function showEventsListFiltered(AdvancedSearchRequest $request)
    {
        $organizzatori = $this->eventsList->getOrganizzatori();
        $regions = $this->eventsList->getRegionList();
        $events = $this->eventsList->getEventsFiltered($request->date, $request->reg, $request->org, $request->desc);
        return view('list')->with('events', $events)->with('regions', $regions)->with('organizzatori', $organizzatori);
    }

    public function showEvent($eventId)
    {
        try {
            $user = auth()->user();
            if ($user !== null) {
                $partecipa = $user->hasPart($user->id, $eventId);
            } else {
                $partecipa = false;
            }
        } catch (Exception $e) {
            $partecipa = false;
        }
        $event = $this->eventsList->getEventById($eventId);
        return view('event')->with('event', $event)->with('partecipa', $partecipa);
    }

    public function showInfo()
    {
        $FAQ = $this->FAQList->getFAQ();
        return view('faq')->with('FAQ', $FAQ);
    }
}
