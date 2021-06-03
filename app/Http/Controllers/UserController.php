<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\EventsList;
use App\Models\PurchaseList;
use App\Models\Resources\Purchase;
use App\Models\Resources\Participation;
use App\Models\Resources\Event;
use App\Http\Requests\PurchaseRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ModifyProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    protected $eventsList;
    protected $purchases;
    protected $participations;

    public function __construct()
    {
        $this->middleware('auth');
        $this->eventsList = new EventsList;
        $this->purchases = new PurchaseList;
        $this->userModel = new User();
        $this->participations = new Participation;
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

    public function Participate($eventId)
    {

        $user = auth()->user();
        $participation = new Participation;
        $participation->nomeutente = $user->nomeutente;
        $participation->idevento = $eventId;
        $participation->save();

        $this->eventsList->getEventById($eventId)->update(['parteciperò' => DB::raw('parteciperò+1')]);
        return redirect::back();
    }

    public function deletePart($eventId)
    {
        $user = auth()->user();
        
        if ($user->hasPart($user->nomeutente, $eventId)) {
             $this->eventsList->getEventById($eventId)->update(['parteciperò' => DB::raw('parteciperò-1')]);
             $this->participations->where(['nomeutente' => $user->nomeutente,'idevento' => $eventId])->delete();
        }
        return redirect()->route('event', [$eventId]);
    }


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
        $lista_acquisti = $this->purchases->getPurchases($user->nomeutente);
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
