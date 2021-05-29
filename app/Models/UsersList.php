<?php

namespace App\Models;

use App\User;

class UsersList{
    
    public function getUserByUsername($username){
        return User::where('nomeutente', $username)->first();
    }
    
    public function getOrgByOrgname($orgname){
        return User::where('organizzazione', $orgname)->first();
    }
}