<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchases')->insert([
            'nomeutente' => 'clieclie',
            'idevento' => 1,
            'nomeevento' => 'Ligabue in concerto',
            'numerobiglietti' => 3,
            'costototale' => 22.50,
            'data' => '2021-05-25'
        ]);

        DB::table('purchases')->insert([
            'nomeutente' => 'clieclie',
            'idevento' => 2,
            'nomeevento' => 'Vasco in concerto',
            'numerobiglietti' => 2,
            'costototale' => 15,
            'data' => '2021-06-05'
        ]);
        
        DB::table('purchases')->insert([
            'nomeutente' => 'clieclie',
            'idevento' => 4,
            'nomeevento' => 'Elisa in concerto',
            'numerobiglietti' => 6,
            'costototale' => 45.00,
            'data' => '2021-04-22'
        ]);
        
        DB::table('purchases')->insert([
            'nomeutente' => 'clieclie',
            'idevento' => 8,
            'nomeevento' => 'Loredana Bertè in concerto',
            'numerobiglietti' => 5,
            'costototale' => 50.00,
            'data' => '2021-06-01'
        ]);
        DB::table('purchases')->insert([
            'nomeutente' => 'clieclie',
            'idevento' => 10,
            'nomeevento' => 'Concerto in teatro',
            'numerobiglietti' => 10,
            'costototale' => 45.00,
            'data' => '2021-06-04'
        ]);
        DB::table('purchases')->insert([
            'nomeutente' => 'clieclie',
            'idevento' => 9,
            'nomeevento' => 'Neffa Speciale Live',
            'numerobiglietti' => 1,
            'costototale' => 8.50,
            'data' => '2021-05-31'
        ]);
        DB::table('purchases')->insert([
            'nomeutente' => 'clieclie',
            'idevento' => 7,
            'nomeevento' => 'Evento musicale estate 2021',
            'numerobiglietti' => 6,
            'costototale' => 36.00,
            'data' => '2021-04-17'
        ]);
        
    }
}
