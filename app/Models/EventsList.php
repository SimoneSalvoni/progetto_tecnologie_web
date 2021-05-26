<?php

namespace App\Models;

use App\Models\Resources\Event;
use App\Models\Resources\User;

class EventsList
{

    public function getEvents()
    {
        $events = Event::orderBy('data')->paginate(8);
        return $events;
    }


    public function getEventsFiltered($data = null, $regione = null, $organizzazione = null, $descrizione = null)
    {
        $filters = array("data" => $data, "regione" => $regione, "organizzazione" => $organizzazione, "descrizione" => $descrizione);

        //Controllo quali filtri sono stati settati
        foreach ($filters as $key => $value) {
            if (is_null($value)) {
                unset($filters[$key]);
            }
        }

        //Creo l'array sul quale verrà fatta la query
        $queryFilters = [];
        foreach ($filters as $key => $value) {
            switch ($key) {
                case "data":
                    $queryFilters[] = ["data", "LIKE", "%" . strval($data) . "%"];
                    break;
                case "regione":
                    $queryFilters[] = ["regione", "LIKE", strval($regione)];
                    break;
                case "organizzazione":
                    $queryFilters[] = ["nomeorganizzatore", "LIKE", strval($organizzazione)];
                    break;
                case "descrizione":
                    $queryFilters[] = ["descrizione", "LIKE", "%" . strval($descrizione) . "%"];
                    break;
                default;
            }
        }

        //Controllo se non è presente alcun filtro
        if (empty($queryFilters)) {
            $eventList = Event::orderBy('data');
        }

        //Caso in cui sia presente almeno un filtro
        else {
            $eventList = Event::where($queryFilters);
        }

        return $eventList->paginate(8);
    }

    public function getNearEvents()
    {
        return Event::orderBy('data')->take(8)->get(); //non dovrebbe servire ->get()
    }

    public function getEventById($eventId)
    {
        return Event::where('id', $eventId)->first();
    }

    public function updateOnPurchase($eventId, $biglietti, $importo)
    {
        $event = Event::where('id', $eventId)->first();
        $event->bigliettivenduti += $biglietti;
        $event->incassototale += $importo;
        $event->save();
    }

    public function getEventsManaged($organizzazione)
    {

        $manageEvent = Event::where('nomeorganizzatore', '==', $organizzazione)->orderBy('data')->take(2)->get();

        return $manageEvent;
    }
}
