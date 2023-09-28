<?php

use App\Http\Controllers\Api\V1\PingController;
use App\Http\Controllers\Api\V1\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')->middleware(['return-json'])->group(function () {
    Route::prefix('v1')->name('v1.')->group(callback: function () {

        Route::get('ping', [PingController::class, 'ping']);

        Route::get('list', [WalletController::class, 'list']);
        Route::post('create', [WalletController::class, 'create']);
    });
    Route::fallback(function () {
        return response()->json([
            'error' => __('Not found'),
        ], 404);
    });

});
