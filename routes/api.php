<?php

use App\Models\TDC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TDCController;
use App\Http\Controllers\ClientController;

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

/**
 * TCD
 */
Route::get('v1/tdc', [TDCController::class, 'index']);
Route::post('v1/tdc', [TDCController::class, 'store']);
Route::get('v1/tdc/{id}', [TDCController::class, 'show']);

/**
 * Cliente
 */
Route::get('v1/client', [ClientController::class, 'index']);
Route::post('v1/client', [ClientController::class, 'store']);
Route::get('v1/client/{id}', [ClientController::class, 'show']);
