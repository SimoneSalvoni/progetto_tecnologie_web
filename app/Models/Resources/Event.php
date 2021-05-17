<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{    
    /**
     * Indica che il modello non devere cercare delle colonne con il time stamp
     * 
     * @var boolean
     */
    public $timestamps = false;
    //use HasFactory;
    
    public function getDiscountedPrice(){
        return ($this->costo) - ($this->costo)*($this->sconto/100);
    }
    
    //forse serve per modificare gli incassi totali con gli acquisti?
    public function getOrganizzatore(){
        return $this->hasOne(User::class, "email", "emailorganizzatore");
    }
}

//RICORDA, BISOGNA (PENSO) METTERE LE PROPRIETA' $guarded IN TUTTI 
//UN METODO PER OTTENERE L'ORGAIZZATORE??? 