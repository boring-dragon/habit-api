<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::whereNotIn('id', Auth::user()->characters->pluck('id'))->get();

        return response()->json([
            'message' => 'Character retrieved successfully',
            'data' => $characters,
        ], 200);
    }


    public function purchaseCharacter(Character $character)
    {
        if(Auth::user()->wallet->balance < $character->price) {
            return response()->json([
                'message' => 'Not enough balance',
            ], 400);
        }

        Auth::user()->characters()->attach($character);

        Auth::user()->wallet->update([
            'balance' => Auth::user()->wallet->balance - $character->price,
        ]);

        return response()->json([
            'message' => 'Character purchased successfully',
            'data' => $character,
        ], 200);
    }


    public function getInventoryItems()
    {
        $inventoryItems = Auth::user()->characters;

        return response()->json([
            'message' => 'Inventory items retrieved successfully',
            'data' => $inventoryItems,
        ], 200);
    }


    public function changeCharacter(Character $character)
    {
        Auth::user()->update([
            'character_id' => $character->id,
        ]);

        return response()->json([
            'message' => 'Character changed successfully',
            'data' => $character,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        //
    }
}
