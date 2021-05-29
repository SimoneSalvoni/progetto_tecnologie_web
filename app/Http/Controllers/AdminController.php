<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FAQList;
use App\Models\UsersList;
use App\Http\Requests\UserSearchRequest;
use App\Http\Requests\FaqRequest;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller {

    protected $FAQList;
    protected $UsersList;

    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->FAQList = new FAQList;
        $this->UsersList = new UsersList;
    }

    public function index() {
        return view('admin');
    }
    
    public function AreaRiservata(){
        $FAQ = $this->FAQList->getFAQ();
        return view('admin')->with('faqs', $FAQ);
    }
    
    public function searchUser(UserSearchRequest $request){
        $FAQ = $this->FAQList->getFAQ();
        if ($request->usertype == 'client'){
            $user = $this->UsersList->getUserByUsername($request->name);
        }
        else{
            $user = $this->UsersList->getOrgByOrgname($request->name);
        }
        return view ('admin')->with('user', $user)->with('faqs', $FAQ);
    }
    
    public function deleteUser($userId){
        $user = $this->UsersList->getUserById($userId);
        $user->delete();
        return redirect()->route('areariservata.admin');
    }
    
    public function deleteFaq ($domanda){
        $faq = $this->FAQList->getSingleFaq($domanda);
        $faq->delete();
        return redirect()->route('areariservata.admin');
    }
    
    public function modifyFaq (FaqRequest $request){
        
    }
    
    public function addFaq (FaqRequest $request){
        
    }
}
