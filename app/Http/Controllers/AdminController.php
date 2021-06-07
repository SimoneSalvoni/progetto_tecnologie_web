<?php

namespace App\Http\Controllers;

use App\Models\FAQList;
use App\User;
use App\Models\Resources\Faq;
use App\Http\Requests\NewOrgRequest;
use App\Http\Requests\ModifyOrgRequest;
use App\Models\UsersList;
use App\Models\EventsList;
use App\Http\Requests\UserSearchRequest;
use App\Http\Requests\FaqRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    protected $FAQList;
    protected $UsersList;
    protected $EverntsList;

    public function __construct()
    {
        $this->middleware('can:isAdmin');
        $this->FAQList = new FAQList;
        $this->UsersList = new UsersList;
        $this->EventsList = new EventsList;
    }

    public function index()
    {
        return view('admin');
    }

    /*
     * Questa funzione ottiene le faq da mostrare nell'area riserva dell'admin, per poi restituire
     * la relativa vista
     */
    public function AreaRiservata()
    {
        $FAQ = $this->FAQList->getFAQ();
        $orgs = $this->UsersList->getOrganizzatori();
        Log::debug($orgs);
        return view('admin')->with('faqs', $FAQ)->with('orgs', $orgs);
    }

    /*
     * Gestisce la ricerca di un utente da parte dell'admin.
     * A dipendenza della tipologia selezionata si ricerca o il nome utente
     * o il nome dell'organizzazione.
     *
     * @param $request è la richiesta di ricerca che arriva dalla form
     */
    public function searchUser(UserSearchRequest $request)
    {
        $FAQ = $this->FAQList->getFAQ();
        $orgs = $this->UsersList->getOrganizzatori();
        if ($request->usertype == 'client') {
            $user = $this->UsersList->getUserByUsername($request->username);
            return view('admin')->with('user', $user)->with('faqs', $FAQ)->with('orgs', $orgs);
        } else {
            $user = $this->UsersList->getOrgByOrgname($request->orgname);
            $events = $this->EventsList->getEventsManaged($request->orgname);
            $biglietti = 0;
            $incasso = 0;
            foreach ($events as $event) {
                $biglietti += $event->bigliettivenduti;
                $incasso += $event->incassototale;
            }
            return view('admin')->with('user', $user)->with('faqs', $FAQ)->with('biglietti', $biglietti)->with('incasso', $incasso)
                ->with('orgs', $orgs);
        }
    }

    /*
     * Questa funzione richiede la cancellazione di un utente dal DB. Redirige poi all'area riservata dell'admin
     *
     * @param $userId è l'id dell'utente da cancellare
     */
    public function deleteUser($userId)
    {
        $user = $this->UsersList->getUserById($userId);
        if ($user !== null)
            $user->delete();
        return redirect()->route('areariservata.admin');
    }

    /*
     * Questa funzione richiede la modifica di una FAQ dal DB. Ridirige poi all'area riservata dell'admin
     *
     * @param $request è il risultato del submit di modifica di una FAQ
     * @param $vecchiadomanda è la domanda originale della FAQ che si vuole modificata, necessaria come riferimento alla
     *        faq da modificare
     */
    public function modifyFaq(FaqRequest $request)
    {
        $faq = $this->FAQList->getSingleFaq($request->vecchiadomanda);
        $faq->domanda = $request->domanda;
        $faq->risposta = $request->risposta;
        $faq->save();
        return redirect()->route('areariservata.admin');
    }

    /*
     * Questa funzione richiede l'aggiunta di una FAQ nel DB. Poi redirige all'area riservaa dell'admin
     *
     * @param $request è il risultato del submit di modifica di una FAQ
     */
    public function addFaq(FaqRequest $request)
    {
        $faq = new Faq;
        $faq->fill($request->validated());
        $faq->save();
        return redirect()->route('areariservata.admin');
    }

    /*
     * Questa funzione richiede la cancellazione di una FAQ dal DB. Poi redirige all'area riservaa dell'admin
     *
     * @param $domanda è la domanda della FAQ da cancellare
     */
    public function deleteFaq($domanda)
    {
        $faq = $this->FAQList->getSingleFaq(urldecode($domanda));
        $faq->delete();
        return redirect()->route('areariservata.admin');
    }


    /**
     * Gestisce l'indirizzamento alle form di inserimento o modifica organizzatore.
     * Se viene passato l'id dell'organizzatore rimandera l'utente alla form di modifica
     * altrimenti rimanderà alla form di inserimento.
     *
     * @param $orgId Id dell'organizzatore che eventualment si intende modificare
     */
    public function ManageOrg($orgId = null)
    {
        if ($orgId !== null) {
            $org = $this->UsersList->getUserById($orgId);
            return view('add_and_modify_org')->with('org', $org);
        }
        return view('add_and_modify_org');
    }


    /**
     * Prende dalla richiesta i dati necessati e li inserisce all'interno di un modello di organizzatore
     * poi ritorna alla rotta dell'area riservata dell'admin
     *
     * @param $request Richiesta che arriva dalla form di inserimento di un nuovo organizzatore
     */
    public function InsertOrg(NewOrgRequest $request)
    {
        $org = new User;
        $org->fill($request->validated());
        $org->livello = 3;
        $org->password = Hash::make($org->password);
        $org->save();
        return redirect()->route('areariservata.admin');
    }

    /**
     * Prende i dati dalla richiesta e li inserisce all'interno dell'istanza di organizzatore che si intende modificare
     * poi ritorna alla rotta dell'area riservata dell'admin
     *
     * @param $request Richiesta che arriva dalla form di modifica di un organizzatore
     */
    public function ModifyOrg(ModifyOrgRequest $request)
    {
        $org = $this->UsersList->getUserById($request->idOrg);
        $org->fill($request->validated());
        if (isset($request->nuovapassword)) {
            $org->password = Hash::make($request->nuovapassword);
        }
        $org->password = Hash::make($org->password);
        $org->save();
        return redirect()->route('areariservata.admin');
    }
}
