<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Lista dei filtri utilizzabili per la ricerca degli eventi.
 * 
 * @author Lorenzo
 */
class Filters {
    /**
     * Recupera gli eventi programmati in una certa data
     * @param type $data
     * @return type
     */
    public function FilterByData($data){
        return Event::where('data','=',strval($data))->get();
    }
    
    /**
     * Recupera gli eventi organizzati da una certa società organizzatrice
     * @param type $organizzatore
     * @return type
     */
    public function FilterByOrganizzatore($organizzatore){
        $emails = User::where([['nomeutente', '=', $organizzatore], ['livello', '=', 3]])->select('email')->get();
        return Event::where('emailorganizzatore', '=', strval($emails))->get();
        //in teoria il nome utente è diverso per ogni organizzatore quindi dovrebbe funzionare senza problemi
    }
    
    /**
     * Recupera gli eventi che contengono nella descrizione le parole passate
     * @param type $descrizione
     * @return type
     */
    public function FilterByDescizione($descrizione) {
        return Event::where('descrizione', '=', '%'.strval($descrizione).'%');
    }
    
    public function getEventsFiltered($data=null, $regione=null, $organizzazione=null, $descrizione=null){
            $filters = array("data" => $data, "regione" => $regione, "organizzazione" => $organizzazione, "descrizione" => $descrizione);
            
            //Controllo quali filtri sono stati settati
            foreach ($filters as $key => $value){
                if (is_null($value)){unset($filters[$key]);}
            }
            $eventList;

            //Creo l'array sul quale verrà fatta la query
            $queryFilters = [];
            foreach ($filters as $key => $value){
                switch ($key){
                    case "data":
                        $queryFilters[]=["data", "LIKE", strval($data)];
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
            if(empty($queryFilters)){$eventList = Event::all()->get();}
            //Caso in cui l'array non sia vuoto
            else{$eventList = Event::where($queryFilters.values())->get();}
    
    //TODO Trovare un modo per effettuare la ricerca con la regione
}   

