<?php

namespace App\Models;

use App\Models\Resources\Event;
use App\Models\Resources\User;


class Org
{

    public function getOrgEvents($organizzazione)
    {
        $filters = array("nomeorganizzatore" => $organizzazione);
        return Event::where($filters)->orderBy('data')->paginate(8);
    }

    public function EliminaEvento($eventId)
    {
        if (Event::find($eventId)) {
            return Event::find($eventId)->delete();
        }
        return false;
    }
}
