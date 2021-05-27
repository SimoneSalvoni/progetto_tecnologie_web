<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventsList;
use App\Models\FAQList;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\AdvancedSearchRequest;

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
        $event = $this->eventsList->getEventById($eventId);
        return view('event')->with('event', $event);
    }

    public function showInfo()
    {
        $FAQ = $this->FAQList->getFAQ();
        return view('faq')->with('FAQ', $FAQ);
    }
}
