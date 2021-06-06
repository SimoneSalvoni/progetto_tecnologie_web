<?php

namespace App\Http\Controllers;

use App\Models\EventsList;
use App\Models\PurchaseList;
use App\Models\Participations;
use App\Models\Resources\Purchase;
use App\Models\Resources\Participation;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Session;
use App\User;

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
        $this->participations = new Participations;
    }

    public function index()
    {
        $nearEvents = $this->eventsList->getNearEvents();
        return view('home')->with('nearEvents', $nearEvents);
    }

    /*
     * Questa funzione ottiene gli eventi più vicini di cui l'utente attuale ha acquistato i biglietti,
     * se presenti
     */
    public function AreaRiservata()
    {
        $user = auth()->user();
        $nearEvents = $this->userModel->nearEvents($user->nomeutente);
        if ($nearEvents != null) {
            return view('user')->with('user', $user)->with('nearEvents', $nearEvents);
        }
        return view('user')->with('user', $user);
    }

    /*
     * Questa funzione ottiene i dati dell'evento da comprare e controlla se è in sconto
     *
     * @param $eventId è l'id dell'evento da ottenere
     */
    public function showPurchaseScreen($eventId)
    {
        $event = $this->eventsList->getEventById($eventId);
        $isOnSale = $this->eventsList->checkOnSale($event);
        return view('buy')->with('event', $event)->with('saldo', $isOnSale);
    }

    /*
     * Questa funzione compie l'acquisto dei biglietti andando a richiedere la modifica dei dati nel DB.
     * Succesivamente redirige alla pagina di ripeilogo inserendo nella sessione i dati necessari
     *
     * @param $request è il risultato della submit della form d'acquisto
     */
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

    /*
     * Questa funzione richiede l'aggiornamento del DB di fronte alla richiesta dell'utente di voler partecipare
     * ad un certo evento. Alla fine redirige alla stessa pagina dell'evento
     *
     * @param $eventId è l'id dell'evento a cui l'utente vuole partecipare
     */
    public function Participate($eventId)
    {
        $user = auth()->user();
        $participation = new Participation;
        $participation->nomeutente = $user->nomeutente;
        $participation->idevento = $eventId;
        $participation->save();
        $numpart = $this->participations->countParticipations($eventId);
        $this->eventsList->getEventById($eventId)->update(['parteciperò' => $numpart]);
        return redirect()->route('event', [$eventId]);
    }

    /*
     * Questa funzione cancella la partecipazione ad un evento da parte di un utente. Richiede la
     * modifica del DB e poi redirige alla stessa pagina dell'evento.
     *
     * @param $eventId è l'id dell'evento a cui l'utente vuole partecipare
     */
    public function deletePart($eventId)
    {
        $user = auth()->user();

        if ($user->hasPart($user->nomeutente, $eventId)) {
             $this->participations->getParticipation($user->nomeutente, $eventId)->delete();
             $numpart = $this->participations->countParticipations($eventId);
             $this->eventsList->getEventById($eventId)->update(['parteciperò' => $numpart]);
        }
        return redirect()->route('event', [$eventId]);
    }

    /*
     * Questa funzione ottiene i dati necessari che sono stati posti nella sessione dal metodo buyTickets
     * e poi ritorna la vista di riepilogo acquisto
     */
    public function showRiepilogo()
    {
        $event = Session::get('evento');
        $numBiglietti = Session::get('numerobiglietti');
        $importo = Session::get('importo');
        return view('riepilogo')->with('event', $event)->with('numerobiglietti', $numBiglietti)->with('importo', $importo);
    }

    /*
     * Questa funzione ottiene i dati necessari per visualizzare la cronologia degli acquisti di un utente
     */
    public function CronologiaAcquisti()
    {
        $user = auth()->user();
        $lista_acquisti = $this->purchases->getPurchases($user->nomeutente);
        return view('purchase_list')->with('purchases', $lista_acquisti["purchases"])
            ->with('images', $lista_acquisti["images"]);
    }

    /*
     * Questa funzione ottiene un'istanza dell'utente corrente, necessaria per mostrare la pagina di modifica del profilo,
     * la cui vista viene restituita
     */
    public function showModifyProfile()
    {
        $user = auth()->user();
        return view('modify_profile')->with('user', $user);
    }

    /*
     * Questa funzione esegue la modifica del profilo di un utente, richiedendo la modifica dei dati salvati nel DB.
     *
     * @param $request è il risultato del submit della form di modifica
     */
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
