<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
            'password' => Hash::make('passworddiprova'),
            'organizzazione' => 'Acme',
            'livello' => 3,
            'email_verified_at' => now(),
            //'remembertoken'=> Str::random(10),
            //'timestamps'=> time()
        ]);
        
        DB::table('users')->insert([
            'nomeutente'=> 'Pippo',
            'email'=>'pippo2@studenti.univpm.it',
            'password' => Hash::make('passworddiprova'),
            'organizzazione' => 'Sconcert',
            'livello' => 3,
            'email_verified_at' => now(),
            //'remembertoken'=> Str::random(10),
            //'timestamps'=> time()
        ]);
        
        DB::table('users')->insert([
            'nomeutente'=> 'Pluto',
            'email'=>'Pluto2@studenti.univpm.it',
            'password' => Hash::make('passworddiprova'),
            'livello' => 2,
            'nome' =>'Paolo',
            'cognome' => 'Fresca',
            'email_verified_at' => now(),
            //'remembertoken'=> Str::random(10),
            //'timestamps'=> time()
        ]);
        
        DB::table('users')->insert([
            'nomeutente'=> 'Paperino',
            'email'=>'paperino2@studenti.univpm.it',
            'password' => Hash::make('passworddiprova'),
            'organizzazione' => 'Sup',
            'livello' => 3,
            'email_verified_at' => now(),
            //'remembertoken'=> Str::random(10),
            //'timestamps'=> time()
        ]);
        
                
    }
}
