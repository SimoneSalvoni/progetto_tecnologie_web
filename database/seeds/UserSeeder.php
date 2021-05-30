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
            'password' => Hash::make('passworddiprova'),
            'livello' => 2,
            'nome' => 'Paolo',
            'cognome' => 'Tresca',
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
        
         DB::table('users')->insert([
            'nomeutente'=> 'Admin',
            'email'=>'admin@studenti.univpm.it',
            'password' => Hash::make('passworddiprova'),
            'livello' => 4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
