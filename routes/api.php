<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/vehicle', [VehicleController::class, 'getVehicle'])->name('vehicle.list');
// Route::get('/vehicle/{id}', 'App\Http\Controllers\VehicleController@getVehicleById')->name('vehicle.detail');
Route::post('/vehicle', [VehicleController::class, 'createVehicle'])->name('vehicle.push');

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact mchael@website.com'], 404);
});