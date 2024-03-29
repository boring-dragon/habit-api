<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{

    public function show()
    {
        return response()->json([
            'data' => Auth::user()
        ], 200);
    }


    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
            'password' => 'nullable|string|min:6',
        ]);

        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'bio' => $request->bio,
            'email' => $request->email,
        ]);

        if ($request->has('password')) {
            Auth::user()->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return response()->json([
            'message' => 'User details saved successfully'
        ], 201);
    }

    public function getWalletBalance()
    {
        $wallet = Auth::user()->wallet;

        return response()->json([
            'data' => $wallet
        ], 200);
    }
    public function destroy()
    {
        Auth::user()->delete();

        return response()->json([
            'message' => 'Your account deleted successfully',
        ], 200);
    }
}
