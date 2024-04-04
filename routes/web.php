<?php

use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('/api', [UsersController::class, "GetAllUsers"]);
Route::post('/api/wallets/send-money', [TransactionsController::class, "sendMoney"]);
Route::get('/api/wallets/', [WalletController::class, "getAllWallets"]);
Route::get('/api/wallets/{wallet_id}', [WalletController::class, "getWalletDetails"]);