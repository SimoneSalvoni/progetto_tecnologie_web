<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /*use HasFactory,*/
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'nomeutente',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'nomeutente',
        'password',
        'remember_token',
    ];

    /**
     * Primary key della tabella associata al modello
     *
     * @var string
     */
    protected $primarykey = 'nomeutente';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole($livello){
        $livello=(array)$livello;
        return in_array($this->livello, $livello);
    }
}

