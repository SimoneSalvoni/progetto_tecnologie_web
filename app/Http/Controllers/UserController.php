<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\EventsList;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->eventsList = new EventsList;
    }

    public function index() {
        Log::debug("Nell'usercontroller");
        Log::debug(Auth::check());
        $nearEvents=$this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }

}
