<?php
use App\Models\Resources\Event;

class EventsList{
    
    public function getEvents(){
       $events= Event::all()->paginate(10);
       return $events;
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
        return Event::orderBy('data')->take(8); //non dovrebbe servire ->get()
    }
    
    public function getEventById($eventId){
        return Event::where('id', $eventId);
    }
    
    /*
    public function getOrganizzatore($eventId){
        $event= Event::where('id', $eventId);
        return $event->getOrganizzatore()->nomeutente;
    }
     * */

                
}

