<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Resources\Event;


class Org
{

    public function getOrgEvents($organizzazione)
    {
        $filters = array("nomeorganizzatore" => $organizzazione);
        return Event::where($filters)->orderBy('data')->paginate(8);
    }
    public function getNearOrgEvents($organizzazione)
    {
        $currentDate = Carbon::now()->toDateString();
        return Event::where(["nomeorganizzatore" => $organizzazione])->where('data', '>=', $currentDate)->get();
    }


    public function EliminaEvento($eventId)
    {
        if (Event::find($eventId)) {
            return Event::find($eventId)->delete();
        }
        return false;
    }
}
