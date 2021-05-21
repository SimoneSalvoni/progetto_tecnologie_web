<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c
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
<<<<<<< HEAD
        'nomeutente',
        'email',
        'password'
=======
        'email',
        'nomeutente',
        'password',
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
<<<<<<< HEAD
        'username',
        'password',
        'remember_token',
    ];

=======
        'nomeutente',
        'password',
        'remember_token',
    ];
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c
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

