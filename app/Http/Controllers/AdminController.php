<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FAQList;
use App\User;
use App\Http\Requests\NewOrgRequest;
use App\Http\Requests\ModifyOrgRequest;


class AdminController extends Controller
{

    protected $FAQList;

    public function __construct()
    {
        $this->middleware('can:isAdmin');
        $this->FAQList = new FAQList;
        $this->Org = new User;
    }

    public function index()
    {
        return view('admin');
    }

    public function AreaRiservata()
    {
        $user = auth()->user();
        $FAQ = $this->FAQList->getFAQ();
        return;
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
        // TODO Fare il check se tutti i campi vengono riempiti correttamente
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
        $org = User::where('id', '=', $request->idOrg);
        $org->fill($request->validated());
        // TODO Fare il check se tutti i campi vengono riempiti correttamente
        $org->save();
        return redirect()->route('areariservata.admin');
    }
}
