<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Event; DA DECOMMENTARE

class PublicController extends Controller
{
    protected $eventModel;
    protected $FAQModel;
    
    public function __construct() {
        $this->eventModel = new Event; //evento modello da fare
    }
    
    public function showHomePage (){
        $nearEvents=$this->eventModel->getNearEvents();
        return view('home')->with('nearEvents', '$nearEvents');
    }
    
    public function showEventsList(){
        $events=$this->eventModel->getEvents();
        return view('event-list')->with('events', '$events');
    }
   //TODO INSERIRE NUOVO CONTRLLER/MODIFICARE QUESTO???? PER IL FILTRAGGIO
    
    public function showEvent($eventId){
        $event=$this->eventModel->getEventById($eventId);
        return view('event')->with('event', '$event');
    }
   
    public function showInfo(){
        $FAQ=$this->$FAQModel->getFAQ();
        return view('info')->with ('FAQ', '$FAQ');
    }
    
}
