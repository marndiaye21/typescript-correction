<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //{}
    public function depot(Request $request){
        // $request->validate()
        $transaction = new Transaction();
        $transaction->montant = 
    }
}
