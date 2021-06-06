<?php

namespace App\Models;

use App\Models\Resources\Event;
use Carbon\Carbon;

class EventsList {

    protected $today;

    public function __construct() {
        $this->today = Carbon::now()->toDateString();
    }

    public function getEvents() {
        $events = Event::where('data', '>=', $this->today)->orderBy('data')->paginate(8);
        return $events;
    }

    public function getEventsFiltered($anno = null, $mese = null, $regione = null, $organizzazione = null, $descrizione = null) {
        $data = null;
        if ((isset($anno)) && (isset($mese))) {
            $data = $anno . '-' . $this->chooseMonthNumber($mese);
        }
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
            $eventList = Event::where('data', '>=', $this->today)->orderBy('data');
        }

        //Caso in cui sia presente almeno un filtro
        else {
            $eventList = Event::where($queryFilters)->whereDate('data', '>=', $this->today);
        }

        return $eventList->paginate(8);
    }

    public function getNearEvents() {
        return Event::where('data', '>=', $this->today)->orderBy('data')->take(8)->get(); //non dovrebbe servire ->get()
    }

    public function getEventById($eventId) {
        return Event::where('id', $eventId)->first();
    }

    public function updateOnPurchase($eventId, $biglietti, $importo) {
        $event = Event::where('id', $eventId)->first();
        $event->bigliettivenduti += $biglietti;
        $event->incassototale += $importo;
        $event->save();
    }

    public function getEventsManaged($organizzazione) {
        $manageEvent = array("nomeorganizzatore" => $organizzazione);
        return Event::where($manageEvent)->orderBy('data')->distinct()->get();
    }

    public function getRegionList() {
        $regioni = array('Abruzzo', 'Basilicata', 'Calabria', 'Campania', 'Emilia-Romagna', 'Friuli-Venezia Giulia', 'Lazio',
            'Liguria', 'Lombardia', 'Marche', 'Molise', 'Piemonte', 'Puglia', 'Sardegna', 'Sicilia', 'Toscana',
            'Trentino-Alto Adige', 'Umbria', "Valle d'Aosta", 'Veneto');
        return $regioni;
    }

    public function getMonthList() {
        $mesi = array('Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre',
            'Novembre', 'Dicembre');
        return $mesi;
    }

    public function getOrganizzatori() {
        $organizzatori = Event::select('nomeorganizzatore')->distinct()->get();
        return $organizzatori;
    }

    public function getRemainTickets($eventId) {
        $event = Event::where('id', '=', $eventId)->first();
        return $event->bigliettitotali - $event->bigliettivenduti;
    }

    private function chooseMonthNumber($month) {
        switch ($month) {
            case "Gennaio" : return '01';
            case "Febbraio" : return '02';
            case "Marzo" : return '03';
            case "Aprile" : return '04';
            case "Maggio" : return '05';
            case "Giugno" : return '06';
            case "Luglio" : return '07';
            case "Agosto" : return '08';
            case "Settembre" : return '09';
            case "Ottobre" : return '10';
            case "Novembre" : return '11';
            case "Dicembre" : return '12';
        }
    }

    public function checkOnSale($event) {
        $currentDate = Carbon::now();
        $eventDate = Carbon::parse($event->data);
        $diff = $eventDate->diffInDays($currentDate);
        if ($diff <= $event->giornisconto) {
            return true;
        }
        return false;
    }
    
    public function getProv($region){
        switch($region){
            case 'Abruzzo': return ['CH', 'AQ', 'PE', 'TE'];
            case 'Basilicata': return ['MT', 'PZ'];
            case 'Calabria': return ['CZ', 'CS', 'KR', 'RC', 'VV'];
            case 'Campania': return ['AV', 'BN', 'CE', 'NA', 'SA'];
            case 'Emilia-Romagna': return ['BO', 'FE', 'FC', 'MO', 'PR', 'PC', 'RA', 'RE', 'RN'];
            case 'Friuli-Venezia Giulia': return ['GO', 'PN', 'TS', 'UD'];
            case 'Lazio': return ['FR', 'LT', 'RI', 'RM', 'VT'];
            case 'Liguria': return ['GE', 'IM', 'SP', 'SV'];
            case 'Lombardia': return ['BG', 'BS', 'CO', 'CR', 'LC', 'LO', 'MN', 'MI', 'MB', 'PV', 'SO', 'VA'];
            case 'Marche': return ['AN', 'AP', 'FM', 'MC', 'PU'];
            case 'Molise': return ['CB', 'IS'];
            case 'Piemonte': return ['AL', 'AT', 'BI', 'CN', 'NO', 'TO', 'VB', 'VC'];
            case 'Puglia': return ['BA', 'BT', 'BR', 'FG', 'LE', 'TA'];
            case 'Sardegna': return ['CA', 'NU', 'OR', 'SS', 'SU'];
            case 'Sicilia': return ['AG', 'CL', 'CT', 'EN', 'ME', 'PA', 'RG', 'SR', 'TP'];
            case 'Trentino-Alto Adige': return['BZ', 'TN'];
            case 'Toscana': return ['FI', 'GR', 'LI', 'LU', 'MS', 'PI', 'PT', 'PO', 'SI'];
            case 'Umbria': return ['PG', 'TR'];
            case "Valle d'Aosta": return ['AO'];
            case 'Veneto': return ['BL', 'PD', 'RO', 'TV', 'VE', 'VR', 'VI'];
        }
    }
}
