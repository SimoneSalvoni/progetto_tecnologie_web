<?php

//namespace Database\Seeders;

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
<<<<<<< HEAD
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
=======
            'nomeutente'=> 'Org1',
            'email'=>'org1@studenti.univpm.it',
            'password' => Hash::make('passworddiprova'),
            'organizzazione' => 'Acme',
            'livello' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'nomeutente'=> 'Org2',
            'email'=>'org2@studenti.univpm.it',
            'password' => Hash::make('passworddiprova'),
            'organizzazione' => 'Sconcert',
            'livello' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);

        DB::table('users')->insert([
            'nomeutente'=> 'User1',
            'email'=>'user1@studenti.univpm.it',
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c
            'password' => Hash::make('passworddiprova'),
            'livello' => 2,
            'nome' => 'Paolo',
            'cognome' => 'Tresca',
<<<<<<< HEAD
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
        
                
=======
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);

        DB::table('users')->insert([
            'nomeutente'=> 'Org3',
            'email'=>'org3@studenti.univpm.it',
            'password' => Hash::make('passworddiprova'),
            'organizzazione' => 'Sup',
            'livello' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c
    }
}
