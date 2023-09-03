<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    
    public function home(Request $request){
        $user = $request->user();
        $accounts= Account::where('user_id', $user->id)->get();
        
        return view('dashboard',['accounts'=> $accounts]);
    }
}
