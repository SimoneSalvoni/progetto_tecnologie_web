<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'nome' => Str::random(10),
            'descrizione' => 'Descrizione del primo evento di prova',
            'urlluogo' => Str::random(10),
            'regione' => 'Marche',
            'provincia' => 'AN',
            'indirizzo' => 'via Prova',
            'numciv' => '112',
            'data' => '2021-04-22',
            'immagine' => Str::random(10),
            'costo' => 7.50,
            'sconto' => null,
            'giornisconto' => null,
            'nomeorganizzatore' => 'Lorenzo'
        ]);
        
        DB::table('users')->insert([
            'nome' => Str::random(10),
            'descrizione' => 'Descrizione del secondo evenot di prova',
            'urlluogo' => Str::random(10),
            'regione' => 'Marche',
            'provincia' => 'AN',
            'indirizzo' => 'via Prova',
            'numciv' => '112',
            'data' => '2021-05-10',
            'immagine' => Str::random(10),
            'costo' => 7.50,
            'sconto' => null,
            'giornisconto' => null,
            'nomeorganizzatore' => 'Lorenzo'
        ]);
        
        DB::table('users')->insert([
            'nome' => Str::random(10),
            'descrizione' => 'Terzo della serie',
            'urlluogo' => Str::random(10),
            'regione' => 'Lazio',
            'provincia' => 'AN',
            'indirizzo' => 'via Prova',
            'numciv' => '112',
            'data' => '2021-05-10',
            'immagine' => Str::random(10),
            'costo' => 7.50,
            'sconto' => null,
            'giornisconto' => null,
            'nomeorganizzatore' => 'Pippo'
        ]);
    }

}
