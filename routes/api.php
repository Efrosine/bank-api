<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/user/bind-account', [TransactionController::class, 'requestBindAccount']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);

    // User account routes
    Route::get('/user/account', [UserController::class, 'getAccount']);
    Route::post('/user/top-up', [UserController::class, 'topUpBalance']);

    // Transaction routes
    Route::get('/user/transactions', [TransactionController::class, 'getTransactionHistory']);
    Route::post('/user/payment', [TransactionController::class, 'makePayment']);

});
