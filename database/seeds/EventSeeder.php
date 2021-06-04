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
        $sconto = array(null, null, null, 20, 10, null, null, null, null, 30);
        $giornisconto = array(null, null, null, 10, 10, null, null, null, null, 10);
        $date = array('2021-07-22', '2021-07-23', '2021-07-24', '2021-06-30', '2021-07-30', '2021-07-25', '2021-07-20', '2021-07-20', '2021-08-27', '2021-07-2');
        $nome = array('Ligabue in concerto', 'Vasco in concerto', 'Albano in concerto', 'Elisa in concerto', 'Fabri Fibra in concerto', 'Andrea Bocelli in concerto', 'Evento musicale estate 2021', 'Loredana Bertè in concerto', 'Neffa Speciale Live', 'Concerto in teatro');
        $descrizione = array('Ritorna Ligabue in concerto', 'Ritorna Vasco Rossi in concerto', 'Ritorna Albano in concerto', 'Ritorna Elisa in concerto', 'Ritorna Fabri Fibra in concerto', 'Ritorna Andrea Bocelli in concerto', 'Evento speciale con la partecipazione di molti artisti', 'Ritorna Loredana Berte in concerto', 'Non perderti Neffa in live', 'Evento speciale al teatro delle Muse con la partecipazione di molti artisti locali');
        $organizzatori = array('Acme', 'Acme', 'Acme', 'Acme', 'Acme', 'SConcert', 'SConcert', 'SConcert', 'SConcert', 'Sup');
        for ($i = 0; $i < 10; $i++) {
            DB::table('events')->insert([
                'nome' => $nome[$i],
                'descrizione' => $descrizione[$i],
                'urlluogo' => 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=Via+SanBiagio,+5,+' + $cities[$i] + '+' + $regions[$i] + '&output=embed',
                'regione' => $regions[$i],
                'provincia' => $province[$i],
                'città' => $cities[$i],
                'indirizzo' => $vie[$i],
                'numciv' => '2',
                'città' => $cities[$i],
                'data' => $date[$i],
                'immagine' => 'concert.jpg',
                'costo' => $costo[$i],
                'sconto' => $sconto[$i],
                'giornisconto' => $giornisconto[$i],
                'bigliettitotali' => 50,
                'programma' => 'L\'evento è ricco di sorprese non perdertelo',
                'comeraggiungerci' => "Raggiungere la posizione dell'evento è molto semplice. In caso di problemi consultare la mappa",
                'nomeorganizzatore' => $organizzatori[$i]
            ]);
        }
    }
}
