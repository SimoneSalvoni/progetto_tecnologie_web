<?php

namespace App\Http\Controllers;

use App\Models\Org;
use App\Models\Resources\Event;
use App\Http\Requests\NewEventRequest;

class AdminController extends Controller {

    protected $_orgModel;

    public function __construct() {
        $this->middleware('can:isOrg');
        $this->_orgModel = new Org;
    }

    public function index() {
        return view('org');
    }

    /*
     * Qui mettiamo di default l'attributo dell'evento
     * che specifica il nome dell'organizzazione 
     */
    public function addEvent() {
        $nomeOrg = $this->_orgModel->getOrg()->pluck('nomeorganizzatore');
        return view('event.insert')
                        ->with('nomeorganizzatore', $nomeOrg);
    }

    //Qua va capito meglio il funzionamento della store
    public function storeProduct(NewProductRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $product = new Product;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        return redirect()->action('OrgController@index');
    }

}
