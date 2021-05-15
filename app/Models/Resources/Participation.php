<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    /**
     * Primary key della tabella associata al modello
     * 
     * @var string
     */
    protected $primarykey = 'email';
    
    /**
     * Indica se la primary key è un auto increment o no
     * 
     * @var bool
     */
    public $incrementing = false;
    
    /**
     * Indica che il modello non devere cercare delle colonne con il time stamp
     * 
     * @var boolean
     */
    public $timestamps = false;
    
    /**
     * Il tipo di dato della chiave
     * 
     * @var string
     */
    public $keyType = 'string';
    
    /**
     * Recupera il modello del partecipante
     * 
     * @return User
     */
    public function getPartecipante(){
        return $this->hasOne(User::class, 'emailutente', 'email'); // TODO provare se funziona
    }
    
    /**
     * Recupera il modello dell'evento al quale si intende partecipare
     * 
     * @return Event
     */
    public function getEvento(){
        return $this->hasOne(Event::class, 'idevento', 'id'); // TODO provare se funziona
    }
    //use HasFactory;
}
