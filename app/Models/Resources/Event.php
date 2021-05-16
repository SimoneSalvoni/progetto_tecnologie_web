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
    
    /**
     * Ritrova l'organizzatore associato all'evento
     */
    public function getOrganizzatore(){
        return $this->hasOne(User::class, 'emailorganizzatore', 'email');
    }
    //use HasFactory;
    
    public function getDiscountedPrice(){
        return ($this->costo) - ($this->costo)*($this->sconto/100);
    }
    
    //forse serve per modificare gli incassi totali con gli acquisti?
    public function getOrganizzatore(){
        return $this->hasOne(User::class, "emailorganizzatore", "email");
    }
}

//RICORDA, BISOGNA (PENSO) METTERE LE PROPRIETA' $guarded IN TUTTI 
//UN METODO PER OTTENERE L'ORGAIZZATORE??? 