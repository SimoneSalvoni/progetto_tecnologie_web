<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\EventsList;
use App\Models\PurchaseList;
use App\Models\Resources\Purchase;
use App\Http\Requests\PurchaseRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $eventsList;
    protected $purchases;

    public function __construct()
    {
        $this->middleware('auth');
        $this->eventsList = new EventsList;
        $this->purchases = new PurchaseList;
    }

    public function index()
    {
        $nearEvents = $this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }

    public function AreaRiservata()
    {
        $user = auth()->user();
        //  $nearEvents = ;
        //TODO creare la view dello user
        return view('user')->with('user', $user);
    }

    public function showPurchaseScreen($eventId)
    {
        $event = $this->eventsList->getEventById($eventId)->first();
        return view('buy')->with('event', $event);
    }

    public function buy(PurchaseRequest $request)
    {
        $acquisto = new Purchase;
        $acquisto->fill($request->validated());
        $acquisto->save();
        $this->$this->eventsList->updateOnPurchase($request->idevento, $request->numerobiglietti, $request->costotoale);
        $event = $this->eventsList->getEventById($request->idevento);
        return redirect()->route('riepilogo')->with('event', $event)->with('numBiglietti', $request->numeroBiglietti)
            ->with('importo', $request->costototale); //DATI PASSATI SU SESSION, SI OTTENOGNO CON session('nomedato')
    }

    public function showRiepilogo()
    {
    }
    /**
     * Ritorna la view della cronologia degli acquisti dell'utente attualmente loggato
     */
    public function CronologiaAcquisti()
    {
        $user = auth()->user();
        //Ricordarsi di fare la paginazione
        $lista_acquisti = $this->purchases->getPurchases($user->id);

        return view('purchase_list')->with('purchases', $lista_acquisti["purchases"])
            ->with('images', $lista_acquisti["images"]);
    }
}
