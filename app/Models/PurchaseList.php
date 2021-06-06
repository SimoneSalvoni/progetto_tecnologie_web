<?php

namespace App\Models;

use App\Models\Resources\Purchase;
use App\Models\EventsList;
use Exception;
use Illuminate\Support\Facades\Log;

class PurchaseList
{
    protected $eventsList;

    public function __construct()
    {
        $this->eventsList = new EventsList;
    }

    private function getImgs($eventId)
    {
        return $this->eventsList->getEventById($eventId)->immagine;
    }

    /**
     * Ritorna la lista degli acquisti paginata di un utente
     * Per adesso funziona solo se ad ogni acquisto è associato un evento con una immagine
     */
    public function getPurchases($username)
    {
        $images = array();
        $purchasesList = array();
        $purchases = Purchase::where('nomeutente',$username)->orderBy('data')->paginate(8);
        foreach ($purchases as $purchase) {
            array_push($images, $this->getImgs($purchase->idevento));
        }
        $purchasesList["purchases"] = $purchases;
        $purchasesList["images"] = $images;
        return $purchasesList;
    }
}
