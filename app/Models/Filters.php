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
    //TODO Trovare un modo per effettuare la ricerca con la regione
}   

