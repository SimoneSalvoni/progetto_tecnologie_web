<?php

//namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = array('Marche', 'Marche', 'Marche', 'Marche', 'Lazio', 'Lazio', 'Lazio', 'Abruzzo', 'Abruzzo', 'Molise');
        $cities = array('Ancona', 'Ancona', 'Ascoli', 'Urbino', 'Roma', 'Roma', 'Roma', 'L\'Aquila', 'L\'Acquila', 'Campobasso');
        $province = array('AN', 'AN', 'AP', 'PU', 'RM', 'RM', 'RM', 'AQ', 'AQ', 'CB');
        $vie = array('Martiri della Resistenza', 'Posatora', 'del Teatro', 'Raffaello', 'Ancona', 'Ancona', 'Ancona', 'Amiternum', 'Federico Trecco', 'Larino');
        $costo = array(7.50, 7.50, 7.50, 7.50, 7.50, 5.50, 6.00, 10.0, 8.50, 4.50);
        $sconto = array(50, 25, 35, 20, 10, null, 45, 40, 15, 30);
        $giornisconto = array(3, 14, 5, 10, 10, null, 12, 4, 7, 10);
        $date = array('2021-07-22', '2021-07-23', '2021-07-24', '2021-06-30', '2021-07-30', '2021-07-25', '2021-07-20', '2021-07-20', '2021-08-27', '2021-07-02');
        $nome = array('Ligabue in concerto', 'Vasco in concerto', 'Albano in concerto', 'Elisa in concerto', 'Fabri Fibra in concerto', 'Andrea Bocelli in concerto', 'Evento musicale estate 2021', 'Loredana Bertè in concerto', 'Neffa Speciale Live', 'Concerto in teatro');
        $descrizione = array('Ritorna Ligabue in concerto', 'Ritorna Vasco Rossi in concerto', 'Ritorna Albano in concerto', 'Ritorna Elisa in concerto', 'Ritorna Fabri Fibra in concerto', 'Ritorna Andrea Bocelli in concerto', 'Evento speciale con la partecipazione di molti artisti', 'Ritorna Loredana Bertè in concerto', 'Non perderti Neffa in live', 'Evento speciale al teatro delle Muse con la partecipazione di molti artisti locali');
        $organizzatori = array('Acme', 'Acme', 'Acme', 'Acme', 'Acme', 'Sconcert', 'Sconcert', 'Sconcert', 'Sconcert', 'Sup');
        $bigliettivenduti = array(3, 2, 0, 6, 0, 0, 6, 5, 1, 10);
        $incassototale = array(22.50, 15.00, 0, 45.00, 0, 0, 36.00, 50.00, 8.50, 45.00);
        $immagini('Ligabue.jpg', 'Vasco.png', 'Albano.jpeg', 'Elisa.jpg', 'Fibra.png', 'Boccelli.jpg', 'Estate2021.png', 'Berte.jpeg', 'Neffa.jpg', 'Muse.png');
        $biglietti(50, 100, 75, 200, 150, 300, 75, 100, 125, 50);
        $programmi('[22:00-23:30] 8 pezzi magnifici di Ligabue', '[21:30-23:00] 7 singoli intramontabili di Vasco', '[21:00-22:00] 6 classici di Albano', '[22:00-23:00] 5 nuove canzoni di Elisa', '[21:30-22:30] 4 pezzi classici di Fibra, con una sorpresa sul finale', '[22:00-23:00] 4 classici della canzone italiana cantati dal maestro Bocelli', '[20:00-21:30] 5 band emergenti si intervalleranno per un totale di 10 pezzi', '[21:00-22:30] 6 eterne composizioni di Loredana Bertè', '[21:00-22:00] Un tuffo nel passato con 7 classici di Neffa', '[22:00-24:00] 8 diverse performance di artisti differenti');
        for ($i = 0; $i < 10; $i++) {
            DB::table('events')->insert([
                'nome' => $nome[$i],
                'descrizione' => $descrizione[$i],
                'urlluogo' => 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=Via+' . strval($vie[$i]) . ',+2,+' . strval($cities[$i]) . '+' . strval($regions[$i]) . '&output=embed',
                'regione' => $regions[$i],
                'provincia' => $province[$i],
                'città' => $cities[$i],
                'indirizzo' => $vie[$i],
                'numciv' => '2',
                'città' => $cities[$i],
                'data' => $date[$i],
                'immagine' => $immagini[$i],
                'costo' => $costo[$i],
                'sconto' => $sconto[$i],
                'giornisconto' => $giornisconto[$i],
                'bigliettitotali' => $biglietti[$i],
                'bigliettivenduti' => $bigliettivenduti[$i],
                'incassototale' => $incassototale[$i],
                'programma' => $programmi[$i],
                'comeraggiungerci' => "Raggiungere la posizione dell'evento è molto semplice. In caso di problemi consultare la mappa",
                'nomeorganizzatore' => $organizzatori[$i]
            ]);
        }
    }
}
