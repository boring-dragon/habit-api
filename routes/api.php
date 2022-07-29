<?php

use App\Http\Controllers\API\CharacterController;
use App\Http\Controllers\API\MoodCheckingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\API\HabbitController;
use App\Http\Controllers\API\HabbitTypeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/mood-checking', [MoodCheckingController::class, 'show']);
    Route::post('/mood-checkings',  [MoodCheckingController::class, 'store']);

    Route::put('/saveUserDetails', [SettingsController::class, 'update']);
    Route::get('/getUserDetails', [SettingsController::class, 'show']);

    Route::get('/getHabbits', [HabbitController::class, 'index']);

    Route::get('/getHabbitsCreatedToday', [HabbitController::class, 'getHabbitsCreatedToday']);

    Route::get('/getCounts', function() {

        return response()->json([
            'pending_habits' => Auth::user()->habbits()->where('status', 'created')->count(),
            'completed_habits' => Auth::user()->habbits()->where('status', 'completed')->count(),
        ]);
    });

    Route::get('/getHabbitTypes', [HabbitTypeController::class, 'index']);

    Route::post('/createHabbit', [HabbitController::class, 'store']);

    Route::put('/updateHabbitTarget/{habbit}', [HabbitController::class, 'updateHabbitTarget']);
    Route::put('decreaseHabbitTarget/{habbit}', [HabbitController::class, 'decreaseHabbitTarget']);
    Route::put('/markHabbitAsCompleted/{habbit}', [HabbitController::class, 'markHabbitAsCompleted']);

    Route::get('/getWalletBalance', [SettingsController::class, 'getWalletBalance']);

    Route::get('/getCharacters', [CharacterController::class, 'index']);
    Route::post('/purchaseCharacter/{character}', [CharacterController::class, 'purchaseCharacter']);

    Route::get('/getInventoryItems', [CharacterController::class, 'getInventoryItems']);
    Route::post('/changeCharacter/{character}', [CharacterController::class, 'changeCharacter']);

    Route::delete('/deleteAccount', [SettingsController::class, 'destroy']);


});
