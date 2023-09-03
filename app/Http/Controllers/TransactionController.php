<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
    function create(TransactionRequest $request)  {
         $user = $request->user();
         $account =Account::where('user_id', $user->id)->where('id', $request->account_id)->first();
         if( $account){
            Transaction::create([
                'type' => $request->type,
                'amount' => $request->amount,
                'account_id'=> $request->account_id
            ]);
        }
         }
       

}
