<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
<<<<<<< HEAD

class userController extends Controller {

    public function __construct() {
        $this->middleware('auth');
=======
use App\Models\EventsList;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->eventsList = new EventsList;
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c
    }

    public function index() {
        Log::debug("Nell'usercontroller");
<<<<<<< HEAD
=======
        Log::debug(Auth::check());
>>>>>>> b43d0323975591738b78d6ae21d9db7f55fa613c
        $nearEvents=$this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }

}
