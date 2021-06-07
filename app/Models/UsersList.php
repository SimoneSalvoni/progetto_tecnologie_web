<?php

namespace App\Models;

use App\User;

class UsersList{

    public function getUserByUsername($username){
        return User::where('nomeutente', $username)->first();
    }

    public function getUserById($userId){
        return User::where('id', $userId)->first();
    }

    public function getOrgByOrgname($orgname){
        return User::where('organizzazione', $orgname)->first();
    }

    public function getOrganizzatori(){
        return User::where('organizzazione','!=',null)->select('organizzazione')->get();
    }
}
