<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Habbit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HabbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habbits = Auth::user()->habbits()->where('status', 'created')->orderBy('created_at', 'asc')->get();

        return response()->json([
            'message' => 'Habit retrieved successfully',
            'data' => $habbits,
        ], 200);
    }


    public function updateHabbitTarget(Request $request, Habbit $habbit)
    {

        $habbit->update([
            'current_target_amount' => $habbit->current_target_amount + 1,
        ]);

        return response()->json([
            'message' => 'Habit updated successfully',
            'data' => $habbit,
        ], 200);
    }

    public function decreaseHabbitTarget(Request $request, Habbit $habbit)
    {
        $habbit->update([
            'current_target_amount' => $habbit->current_target_amount - 1,
        ]);

        return response()->json([
            'message' => 'Habit updated successfully',
            'data' => $habbit,
        ], 200);
    }

    public function markHabbitAsCompleted(Request $request, Habbit $habbit)
    {
        $habbit->update([
            'status' => 'completed',
        ]);

        Auth::user()->wallet->update([
            'balance' => Auth::user()->wallet->balance + 8,
        ]);

        return response()->json([
            'message' => 'Habit completed successfully',
            'data' => $habbit,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'habbit_type_id' => 'nullable',
            'description' => 'nullable|string',
            'target_amount' => 'required|integer',
            'targeted_at' => 'required'
        ]);

        $habbit = Auth::user()->habbits()->create($request->all());

        return response()->json([
            'message' => 'Habit Created successfully',
            'data' => $habbit
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Habbit  $habbit
     * @return \Illuminate\Http\Response
     */
    public function show(Habbit $habbit)
    {
        return response()->json([
            'message' => 'Habit retrieved successfully',
            'data' => $habbit,
        ], 200);
    }


    public function getHabbitsCreatedToday()
    {
        $habbits = Auth::user()->habbits()->whereDate('created_at', '=', Carbon::today())->get();

        return response()->json([
            'message' => 'Habit retrieved successfully',
            'data' => $habbits,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Habbit  $habbit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habbit $habbit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Habbit  $habbit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habbit $habbit)
    {
        //
    }
}
