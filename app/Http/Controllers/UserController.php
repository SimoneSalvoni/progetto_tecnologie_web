<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\EventsList;
use App\Models\PurchaseList;
use App\Models\Resources\Purchase;
use App\Http\Requests\PurchaseRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {
    
    protected $eventsList;
    protected $purchases;

    public function __construct() {
        $this->middleware('auth');
        $this->eventsList = new EventsList;
        $this->purchases = new PurchaseList;
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
    
    public function showPurchaseScreen ($eventId){
        Log::debug('dentro showPurchaseScreen');
        $event = $this->eventsList->getEventById($eventId);
        return view ('buy')->with('event', $event);
    }
    
    public function buyTickets (PurchaseRequest $request){
        $acquisto = new Purchase;
        $acquisto->fill($request->validated());
        $acquisto->save();
        $this->eventsList->updateOnPurchase($request->idevento, $request->numerobiglietti, $request->costototale);
        $event=$this->eventsList->getEventById($request->idevento);
        Session::put('evento', $event);
        Session::put('numerobiglietti', $request->numerobiglietti);
        Session::put('importo', $request->costototale);
        return redirect()->route('riepilogo');
    }
    
    public function showRiepilogo (){ 
        $event = Session::get('evento');
        $numBiglietti = Session::get('numerobiglietti');
        $importo = Session::get('importo');
        return view('riepilogo')->with('event', $event)->with('numerobiglietti',$numBiglietti)->with('importo', $importo);
    }
}
