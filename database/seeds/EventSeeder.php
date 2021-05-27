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
        $date = array('2021-07-22', '2021-07-23', '2021-07-24', '2021-07-25', '2021-07-25', '2021-07-25', '2021-07-20', '2021-07-20', '2021-08-27', '2021-08-26');
        $organizzatori = array('Acme', 'Acme', 'Acme', 'Acme', 'Acme', 'SConcert', 'SConcert', 'SConcert', 'SConcert', 'Sup');
        for ($i = 0; $i < 10; $i++) {
            DB::table('events')->insert([
                'nome' => 'Evento di prova ' . strval($i),
                'descrizione' => 'Descrizione dell\'evento di prova numero: ' . strval($i),
                'urlluogo' => 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=Via+SanBiagio,+5,+Osimo+Marche&output=embed',
                'regione' => $regions[$i],
                'provincia' => 'AN',
                'città' => 'Ancona',
                'indirizzo' => 'via Prova',
                'numciv' => '112',
                'data' => $date[$i],
                'immagine' => 'concert.jpg',
                'costo' => 7.50,
                'sconto' => null,
                'giornisconto' => null,
                'bigliettitotali' => 5,
                'comeraggiungerci' => "Guarda la mappa c'è apposta",
                'nomeorganizzatore' => $organizzatori[$i]
            ]);
        }
    }
}
