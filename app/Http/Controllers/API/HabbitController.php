<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Habbit;
use Illuminate\Http\Request;
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
        $habbits = Auth::user()->habbits;

        return response()->json([
            'message' => 'Habit retrieved successfully',
            'data' => $habbits,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Habbit  $habbit
     * @return \Illuminate\Http\Response
     */
    public function edit(Habbit $habbit)
    {
        //
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
