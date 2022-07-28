<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MoodCheckingController extends Controller
{
    public function show()
    {;
        $moodChecking = Auth::user()->mood_checkings()->whereDate('created_at', today())->latest()->first();

        if (!$moodChecking) {
            return response()->json([
                "moodChecked" => false
            ]);
        }

        return response()->json([
            'message' => 'Mood Checking retrieved successfully',
            'data' => $moodChecking,
            "moodChecked" => true
        ],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ]);

        $moodChecking = Auth::user()->mood_checkings()->create($request->all());

        return response()->json([
            'message' => 'Mood Checking created successfully',
            'data' => $moodChecking,
        ], 201);
    }
}
