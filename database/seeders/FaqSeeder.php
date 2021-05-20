<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<=3; $i++){
            DB::table('faqs')->insert([
               'domanda' => 'Domanda numero '.$i,
                'risposta' => 'Risposta numero '.$i
            ]);
        }
    }
}
