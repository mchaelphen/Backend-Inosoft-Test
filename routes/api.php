<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
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



Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

//Product
Route::get('/vehicle', [VehicleController::class, 'getVehicle'])->name('vehicle.list');
Route::get('/vehicle/{id}', [VehicleController::class, 'getVehicleById'])->name('vehicle.detail');
Route::get('/stock', [VehicleController::class, 'getVehiclesWithStock'])->name('vehicles.stock');

// Transaction
Route::get('/transaction', [TransactionController::class, 'getTransactions'])->name('transaction.list');

Route::middleware('jwt.verify')->group(function () {
    Route::post('/vehicle', [VehicleController::class, 'createVehicle'])->name('vehicle.push');
    Route::post('/transaction', [TransactionController::class, 'createTransaction'])->name('transaction.push');
});


Route::fallback(function() {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact mchael@website.com'], 404);
});