<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\EventsList;

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
        Log::debug("RedirectTo login controller");
        $role = auth()->user()->livello;
        Log::debug("Nell login controller: " .strval(Auth::check()));
        switch ($role) {
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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}