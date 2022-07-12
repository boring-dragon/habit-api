<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return response()->json([
            'message' => 'Profile retrieved successfully',
            'data' => $user,
        ], 200);
    }

    public function update()
    {
        // Handle the user profile update
    }
}
