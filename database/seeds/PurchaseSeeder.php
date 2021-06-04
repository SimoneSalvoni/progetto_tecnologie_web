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
            'costototale' => 23,
            'data' => '2021-07-15'
        ]);

        DB::table('purchases')->insert([
            'nomeutente' => 'clieclie',
            'idevento' => 2,
            'nomeevento' => 'Vasco in concerto',
            'numerobiglietti' => 3,
            'costototale' => 23,
            'data' => '2021-07-15'
        ]);
    }
}
