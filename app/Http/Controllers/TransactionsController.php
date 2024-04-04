<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionsController extends Controller
{
    public function sendMoney(Request $request)
    {
        $sender_wallet = Wallet::find($request->sender_wallet_id);
        $receiver_wallet = Wallet::find($request->receiver_wallet_id);

        // Check if sender has sufficient balance
        if ($sender_wallet->balance >= $request->amount) {
            // Deduct amount from sender's wallet
            $sender_wallet->balance -= $request->amount;
            $sender_wallet->save();

            // Add amount to receiver's wallet
            $receiver_wallet->balance += $request->amount;
            $receiver_wallet->save();

            // Record the transaction
            Transactions::create([
                'sender_wallet_id' => $sender_wallet->id,
                'receiver_wallet_id' => $receiver_wallet->id,
                'amount' => $request->amount
            ]);

            return response()->json(['message' => 'Money sent successfully']);
        } else {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }
    }
}