<?php

namespace App\Models;

use App\Models\Resources\Event;
use App\Models\Resources\User;


class Org
{

    public function getOrgEvents($organizzazione)
    {
        $filters = array("organizzazione" => $organizzazione);
        return Event::where($filters)->orderBy('data')->paginate(8);
    }
}
