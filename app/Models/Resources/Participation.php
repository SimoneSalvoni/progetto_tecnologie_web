<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    //use HasFactory;
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
        return $this->belongsTo(User::class, 'nomeutente', ''); // TODO provare se funziona
    }
    
    /**
     * Recupera il modello dell'evento al quale si intende partecipare
     * 
     * @return Event
     */
    public function getEvento(){
        return $this->belongsTo(Event::class, 'idevento', 'id'); // TODO provare se funziona
    }
    //use HasFactory;
}
