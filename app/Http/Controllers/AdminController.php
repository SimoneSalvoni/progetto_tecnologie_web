<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FAQList;
use App\Http\Requests\UserSearchRequest;

class AdminController extends Controller {

    protected $FAQList;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->FAQList = new FAQList;
    }

    public function index() {
        return view('admin');
    }
    
    public function AreaRiservata(){
        $user = auth()->user();
        $FAQ = $this->FAQList->getFAQ();
        return;
    }

}
