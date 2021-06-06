<?php

namespace App\Models;

use App\Models\Resources\Participation;

class Participations
{


    public function getParticipation($nomeutente, $event)
    {
        return Participation::where(['nomeutente' => $nomeutente, 'idevento' => $event])->first();
    }

    public function countParticipations($event)

    {
        return Participation::where(['idevento' => $event])->count();
    }
}
