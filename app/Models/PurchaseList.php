<?php

namespace App\Models;

use App\Models\Resources\Purchase;
use App\Models\EventsList;
use Exception;

class PurchaseList
{
    protected $eventsList;

    public function __construct()
    {
        $this->eventsList = new EventsList;
    }
    public function getEventsBought($username)
    {
        // $events =
    }

    private function getImgs($eventId)
    {
        return $this->eventsList->getEventById($eventId)->immagine;
    }

    /**
     * Ritorna la lista degli acquisti paginata di un utente
     * Per adesso funziona solo se ad ogni acquisto è associato un evento con una immagine
     */
    public function getPurchases($userId)
    {
        $images = array();
        $purchasesList = array();
        $purchases = Purchase::where('id',$userId)->orderBy('data')->paginate(8);
        foreach ($purchases as $purchase) {
            array_push($images, $this->getImgs($purchase->idevento));
        }
        $purchasesList["purchases"] = $purchases;
        $purchasesList["images"] = $images;
        return $purchasesList;
    }
}
