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
use App\Http\Requests\ModifyProfileRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $eventsList;
    protected $purchases;

    public function __construct()
    {
        $this->middleware('auth');
        $this->eventsList = new EventsList;
        $this->purchases = new PurchaseList;
        $this->userModel = new User();
    }

    public function index()
    {
        $nearEvents = $this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }

    public function AreaRiservata()
    {
        $user = auth()->user();
        $nearEvents = $this->userModel->nearEvents($user->nomeutente);
        if ($nearEvents != null) {
            return view('user')->with('user', $user)->with('nearEvents', $nearEvents);
        }
        return view('user')->with('user', $user);
    }

    public function showPurchaseScreen($eventId)
    {
        $event = $this->eventsList->getEventById($eventId);
        return view('buy')->with('event', $event);
    }

    public function buyTickets(PurchaseRequest $request)
    {
        $acquisto = new Purchase;
        $acquisto->fill($request->validated());
        $acquisto->save();
        $this->eventsList->updateOnPurchase($request->idevento, $request->numerobiglietti, $request->costototale);
        $event = $this->eventsList->getEventById($request->idevento);
        Session::put('evento', $event);
        Session::put('numerobiglietti', $request->numerobiglietti);
        Session::put('importo', $request->costototale);
        return redirect()->route('riepilogo');
    }

    public function Participate($user, $event)
    {
        $participation = new Participation;
        $participation->userid = $user->id;
        $participation->idevento = $event->id;
        $participation->save();
        return redirect()->route('event')->with('eventId', $event->id);
    }
/*
    public function deletePart($user, $event)
    {
        if (hasPart($user, $evento)) {
            return table('Event')->where('id', $user->id)->where('name', $event->id)->delete();
        }
        return redirect()->route('event')->with('eventId', $event->id);
    }
    */

    public function showRiepilogo()
    {
        $event = Session::get('evento');
        $numBiglietti = Session::get('numerobiglietti');
        $importo = Session::get('importo');
        return view('riepilogo')->with('event', $event)->with('numerobiglietti', $numBiglietti)->with('importo', $importo);
    }

    public function CronologiaAcquisti()
    {
        $user = auth()->user();
        //Ricordarsi di fare la paginazione
        $lista_acquisti = $this->purchases->getPurchases($user->id);
        return view('purchase_list')->with('purchases', $lista_acquisti["purchases"])
            ->with('images', $lista_acquisti["images"]);
    }

    public function showModifyProfile()
    {
        $user = auth()->user();
        return view('modify_profile')->with('user', $user);
    }

    public function ModifyProfile(ModifyProfileRequest $request)
    {
        $user = auth()->user();
        $this->userModel->fill($request->validated());
        $user->nome = $this->userModel->nome;
        $user->cognome = $this->userModel->cognome;
        $user->email = $this->userModel->email;
        $user->nomeutente = $this->userModel->nomeutente;
        if (isset($this->userModel->password)) {
            $user->password = Hash::make($this->userModel->password);
        }
        $user->save();
        return $this->AreaRiservata();
    }
}
