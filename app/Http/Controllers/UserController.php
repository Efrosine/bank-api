<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Get user account details.
     */
    public function getAccount(Request $request)
    {
        $user = $request->user();
        return response()->json($user);
    }

    /**
     * Top-up user balance.
     */
    public function topUpBalance(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|integer|min:10000', // Minimal top-up 10,000
        ]);

        $user = $request->user();
        $user->balance += $request->amount;
        $user->save();

        $user->transactions()->create([
            'type' => 'deposit',
            'amount' => $request->amount,
            'transaction_date' => now(),
        ]);

        return response()->json([
            'message' => 'Balance topped up successfully : ' . $request->amount,
        ]);
    }
}
