<?php
namespace App\Models;
use App\Models\Resources\Event;

class EventsList{
    
    public function getEvents(){
       $events= Event::all()->paginate(10);
       return $events;
    }
    
    
    //NON RIESCO..
    public function getEventsFiltered($data=null, $regione=null, $organizzazione=null, $descrizione=null){
            $filters = array("data" => $data, "regione" => $regione, "organizzazione" => $organizzazione, "descrizione" => $descrizione);
            
            //Controllo quali filtri sono stati settati
            foreach ($filters as $key => $value){
                if (is_null($value)){unset($filters[$key]);}
            }

            //Creo l'array sul quale verrà fatta la query
            $queryFilters = [];
            foreach ($filters as $key => $value){
                switch ($key){
                    case "data":
                        $queryFilters[]=["data", "LIKE", "%".strval($data)."%"];
                        break;
                    case "regione":
                        $queryFilters[]=["regione", "LIKE", strval($regione)];
                        break;
                    case "organizzazione":
                        $queryFilters[]=["nomeorganizzazione", "LIKE", strval($organizzazione)];
                        break;
                    case "descrizione":
                        $queryFilters[]=["descrizione", "LIKE", "%".strval($descrizione)."%"];
                        break;
                    default;
                }
            }
            
           //Controllo se non è presente alcun filtro
            if(empty($queryFilters)){$eventList = Event::all();}
            
            //Caso in cui sia presente almeno un filtro
            else{$eventList = Event::where($queryFilters)->get();}
            
            return $eventList;
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

