<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getAllWallets()
    {
        $wallets = Wallet::all();
        if ($wallets->isEmpty()) {
            return response()->json(['error' => 'You have not created a Wallet'], 404);
        } else {
            return response()->json($wallets);
        }
    }

    public function getWalletDetails($wallet_id)
    {
        $wallet = Wallet::with('user')->find($wallet_id);
        if (!$wallet) {
            return response()->json(['error' => 'Wallet not found'], 404);
        }
        return response()->json($wallet);
    }
}