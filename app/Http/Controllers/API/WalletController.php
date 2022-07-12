<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function show(Wallet $wallet)
    {
        return response()->json([
            'message' => 'Wallet retrieved successfully',
            'data' => $wallet,
        ], 200);
    }

    public function update(Request $request, Wallet $wallet)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $wallet->update($request->all());

        return response()->json([
            'message' => 'Wallet updated successfully',
            'data' => $wallet,
        ], 200);
    }
}
