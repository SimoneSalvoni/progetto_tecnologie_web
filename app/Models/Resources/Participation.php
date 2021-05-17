<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    /**
     * Indica che il modello non devere cercare delle colonne con il time stamp
     *  
     * @var boolean
     */
    public $timestamps = false;
    
    /**
     * Recupera il modello del partecipante
     * 
     * @return User
     */
    public function getPartecipante(){
        return $this->hasOne(User::class, 'email', 'emailutente'); // TODO provare se funziona
    }
    
    /**
     * Recupera il modello dell'evento al quale si intende partecipare
     * 
     * @return Event
     */
    public function getEvento(){
        return $this->hasOne(Event::class, 'id', 'idevento'); // TODO provare se funziona
    }
    //use HasFactory;
}
