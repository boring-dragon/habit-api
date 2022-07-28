<?php

use App\Http\Controllers\API\MoodCheckingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\API\HabbitController;
use App\Http\Controllers\API\HabbitTypeController;



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

    Route::get('/getHabbits', [HabbitController::class, 'show']);
    Route::get('/getHabbitTypes', [HabbitTypeController::class, 'show']);



});
