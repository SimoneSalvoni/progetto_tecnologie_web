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
    
    public function __construct() {             
        $this->eventsList = new EventsList; 
        $this->FAQList = new FAQList;
    }
    
    public function showHomePage (){
        $nearEvents=$this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }
    
    public function showEventsList(){
        $events=$this->eventsList->getEvents();
        return view('list')->with('events', $events);
    }
   
    public function showEventsListFiltered(AdvancedSearchRequest $request){
        $events = $this->eventsList->getEventsFiltered($request->date, $request->reg, $request->org, $request->desc);
        return view ('list')->with ('events', $events);
    }
    
    public function showEvent($eventId){
        Log::debug(strval($eventId));
        $events=$this->eventsList->getEventById($eventId);
        return view('event')->with('events', $events);
    }
   
    public function showInfo(){
        $FAQ=$this->FAQList->getFAQ();
        return view('faq')->with ('FAQ', $FAQ);
    }
    
}
