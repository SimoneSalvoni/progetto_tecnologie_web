<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{       
    /**
     * Indica che il modello non devere cercare delle colonne con il time stamp
     * 
     * @var boolean
     */
    public $timestamps = false;
    
    /**
     * Recupera il modello dell'utente che ha fatto l'acquisto
     * 
     * @return User
     */
    public function getUtente(){
        return $this->hasOne(User::class,'email', 'emailutente');
    }
    
    /**
     * Recupera il modello dell'evento acquistato
     * 
     * @return Event
     */
    public function getEvento(){
        return $this->hasOne(Event::class, 'id','idevento');
    }
    //use HasFactory;
}
