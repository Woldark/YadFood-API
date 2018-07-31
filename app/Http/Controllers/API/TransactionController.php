<?php

namespace App\Http\Controllers\API;

use App\Transaction;
use Illuminate\Routing\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json([
            'error' => false,
            'transactions' => $transactions
        ], 200);
    }

    public function student_transactions($id)
    {
        $transaction = Transaction::where('student_id', $id)->get();

        return response()->json([
            'error' => false,
            'transactions' => $transaction
        ], 200);
    }

    public function wallet_transactions($id)
    {
        $transactions = Transaction::where('wallet_id', $id)->get();

        return response()->json([
            'error' => false,
            'transactions' => $transactions
        ], 200);
    }

}
