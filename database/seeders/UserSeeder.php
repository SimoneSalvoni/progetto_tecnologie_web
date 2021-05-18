<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nomeutente'=> 'Lorenzo',
            'email'=>'s1090517@studenti.univpm.it',
            'password' => 'passworddiprova',
            'livello' => 3,
            'email_verified_at' => now(),
            //'remembertoken'=> Str::random(10),
            //'timestamps'=> time()
        ]);
        
        DB::table('users')->insert([
            'nomeutente'=> 'Pippo',
            'email'=>'pippo2@studenti.univpm.it',
            'password' => 'passworddiprova',
            'livello' => 3,
            'email_verified_at' => now(),
            //'remembertoken'=> Str::random(10),
            //'timestamps'=> time()
        ]);
        
        DB::table('users')->insert([
            'nomeutente'=> 'Pluto',
            'email'=>'Pluto2@studenti.univpm.it',
            'password' => 'passworddiprova',
            'livello' => 2,
            'email_verified_at' => now(),
            //'remembertoken'=> Str::random(10),
            //'timestamps'=> time()
        ]);
        
                
    }
}
