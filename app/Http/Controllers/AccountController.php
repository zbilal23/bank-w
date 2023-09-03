<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    

    public function index($account_id){
       $account= Account::with(['transactions'])->where('id', $account_id);
       return view('account',['account'=> $account]);
    }
    

}
