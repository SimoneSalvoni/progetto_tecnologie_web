<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

class userController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        Log::debug("Nell'usercontroller");
        $nearEvents=$this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }

}
