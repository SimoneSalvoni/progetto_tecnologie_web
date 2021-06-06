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
            'nomeutente' => 'orgaorga',
            'email' => 'orgaorga@studenti.univpm.it',
            'password' => Hash::make('lBeppPJ4'),
            'organizzazione' => 'Acme',
            'livello' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('users')->insert([
            'nomeutente' => 'clieclie',
            'email' => 'clieclie@studenti.univpm.it',
            'password' => Hash::make('lBeppPJ4'),
            'livello' => 2,
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);

        DB::table('users')->insert([
            'nomeutente' => 'admiadmin',
            'email' => 'adminadmin@studenti.univpm.it',
            'password' => Hash::make('lBeppPJ4'),
            'livello' => 4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
