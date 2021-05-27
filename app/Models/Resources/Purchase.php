<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {
    //use HasFactory;

    /**
     * Indica che il modello non devere cercare delle colonne con il time stamp
     * 
     * @var boolean
     */
    public $timestamps = false;
    
    protected $fillable = [
        'nomeutente',
        'idevento',
        'nomeevento',
        'numerobiglietti',
        'costototale',
        'data'
    ];
    protected $guarded = [
        'id'
    ];

    /**
     * Recupera il modello dell'utente che ha fatto l'acquisto
     * 
     * @return User
     */
    public function getUtente() {
        return $this->belongsTo(User::class, 'nomeutente', 'nomeutente');
    }

    //ho dovuto eliminare la relazione con evento perchè non è "uno a uno" oppure "un a molti"
    //use HasFactory;
}
