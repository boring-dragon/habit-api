<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Habbit;
use App\Models\HabbitType;
use Illuminate\Http\Request;

class HabbitTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habbits = Habbit::with('user', 'habbit_type')->orderBy('name')->get();

        return response()->json([
            'data' => $habbits,
            'message' => 'Habits retrieved successfully',
        ]);
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
            'name' => 'required|string|max:255',
            'descriptiom' => 'nullable',
        ]);

        $habbitType = HabbitType::create($request->all());

        return response()->json([
            'message' => 'Habit Type created successfully',
            'data' => $habbitType,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HabbitType  $habbitType
     * @return \Illuminate\Http\Response
     */
    public function show(HabbitType $habbitType)
    {
        return response()->json([
            'message' => 'Habit Type retrieved successfully',
            'data' => $habbitType,
        ], 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HabbitType  $habbitType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HabbitType $habbitType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descriptiom' => 'nullable',
        ]);

        $habbitType->update($request->all());

        return response()->json([
            'message' => 'Habit Type updated successfully',
            'data' => $habbitType,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HabbitType  $habbitType
     * @return \Illuminate\Http\Response
     */
    public function destroy(HabbitType $habbitType)
    {
        $habbitType->delete();

        return response()->json([
            'message' => 'Habit Type deleted successfully',
        ], 200);
    }
}
