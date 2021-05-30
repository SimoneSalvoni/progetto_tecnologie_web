<?php

namespace App\Models;
use App\Models\Resources\Faq;

class FAQList{
    
    public function getFAQ(){
        return Faq::all();
    }
    
    public function getSingleFaq ($domanda){
        return Faq::where('domanda', $domanda)->first();
    }
}
