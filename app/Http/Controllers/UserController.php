<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\EventsList;
use App\Models\PurchaseList;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    
    protected $eventsList;
    protected $purchases;

    public function __construct() {
        $this->middleware('auth');
        $this->eventsList = new EventsList;
<<<<<<< HEAD

=======
        $this->purchases = new PurchaseList;
>>>>>>> 7e1b4544963126cb9497e26bca9978faa127ac3d
    }


    public function index() {
        $nearEvents=$this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }

    public function AreaRiservata(){
        $user = auth()->user();
      //  $nearEvents = ;
        //TODO creare la view dello user
        return view('user')->with('user',$user);
    }

}
