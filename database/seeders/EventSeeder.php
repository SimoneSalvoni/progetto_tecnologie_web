<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $regions = array('Marche', 'Marche', 'Marche', 'Marche', 'Lazio', 'Lazio', 'Lazio', 'Abruzzo', 'Abruzzo', 'Molise');
        $date = array('2021-04-22', '2021-04-23', '2021-04-24', '2021-03-25', '2021-03-25', '2021-03-25', '2021-04-20', '2021-02-20', '2021-02-27', '2021-02-26');
        $organizzatori = array('Acme', 'Acme', 'Acme', 'Acme', 'Acme', 'SConcert', 'SConcert', 'SConcert', 'SConcert', 'Sup');
        for ($i=0; $i<10; $i++){
        DB::table('events')->insert([
            'nome' => 'Evento di prova '.strval($i),
            'descrizione' => 'Descrizione dell\'evento di prova numero: '.strval($i),
            'urlluogo' => 'https://www.google.it/maps/place/Universit%C3%A0+Politecnica+delle+Marche+-+Facolt%C3%A0+di+Ingegneria/@43.5867829,13.5144063,17z/data=!3m1!4b1!4m5!3m4!1s0x132d80233dd931ef:0x161719e4f3f5daaf!8m2!3d43.586779!4d13.516595',
            'regione' => $regions[$i],
            'provincia' => 'AN',
            'indirizzo' => 'via Prova',
            'numciv' => '112',
            'data' => $date[$i],
            'immagine' => 'concert.jpg',
            'costo' => 7.50,
            'sconto' => null,
            'giornisconto' => null,
            'nomeorganizzatore' => $organizzatori[$i]
        ]);
        }
    }

}
