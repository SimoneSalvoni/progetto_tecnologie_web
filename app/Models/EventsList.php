<?php
use App\Models\Resources\Event;

class EventsList{
    
    public function getEvents(){
       return Event::all()->paginate(10);
    }
    
    
    //NON RIESCO..
    public function getEventsFiltered($date, $reg, $org, $desc){
        $events =  Event::all();
        if (isset($date)){
            //data????
        }
        if (isset($reg)){
           // $events = $events->where('') regione/luogo????
        }
        if (isset($org)){
           // $o=getOrganizzatore()->email;
           // $events=$events->where('');
        }
    }
    
    public function getNearEvents(){
        return Event::orderBy('data')->take(16); //non dovrebbe servire ->get()
    }
    
    public function getEventById($eventId){
        return Event::where('id', $eventId);
    }
}

