<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Override:: definisce la homepage per i diversi utenti divisi per livello.
     *
     * @var string
     */
    
    protected function redirectTo() {        
        $role = auth()->users()->livello;
        switch ($livello) {
            case 4: return '/admin';
                break;
            case 3: return '/org';
                break;
            case 2: return '/user';
                break;
            default: return '/';
        };
    }

    /**
     * Override:: Login con 'nomeutente' al posto di 'email'.
     *
     */
    
    public function username() {
        return 'nomeutente';
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
