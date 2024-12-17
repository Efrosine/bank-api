<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountBinding;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Request bind account to e-commerce.
     */
    public function requestBindAccount(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'ecommerce_user_id' => 'required|integer',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Delete previous tokens and generate a new one
            $token = $user->createToken('bind-token')->plainTextToken;
            // Create an account binding record
            $user->accountBindings()->create([
                'ecommerce_user_id' => $request->ecommerce_user_id,
                'linked_at' => now(),
            ]);

            $token = $user->createToken('ecommerce-bind')->plainTextToken;

            return response()->json(['token' => $token]);
        }
        return response()->json(['message' => 'Invalid bank credentials'], 401);

    }

    /**
     * Make a payment.
     */
    public function makePayment(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|integer|min:1000', // Minimal payment 1,000
        ]);

        $user = $request->user();

        // Check if the user is bound to an e-commerce account
        $binding = $user->accountBindings()->where('status', 'active')->first();

        if (!$binding) {
            return response()->json(['message' => 'User is not bound to any e-commerce account'], 403);
        }

        // Check if the user has sufficient balance
        if ($user->balance < $request->amount) {
            return response()->json(['message' => 'Insufficient balance'], 400);
        }

        // Deduct the amount and create a transaction record
        $user->balance -= $request->amount;
        $user->save();

        $user->transactions()->create([
            'type' => 'payment',
            'amount' => $request->amount,
            'transaction_date' => now(),
        ]);

        return response()->json(['message' => 'Payment successful, balance :' . $user->balance]);
    }

    /**
     * Get transaction history of the authenticated user.
     */
    public function getTransactionHistory(Request $request)
    {
        $user = $request->user();

        // Retrieve the transactions for the authenticated user
        $transactions = $user->transactions()->orderBy('transaction_date', 'desc')->get();

        return response()->json($transactions);
    }
}
