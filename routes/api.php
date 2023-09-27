<?php

use App\Http\Controllers\Api\V1\PingController;
use Illuminate\Http\Request;
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

Route::name('api.')->group(function () {
    Route::prefix('v1')->name('v1.')->group(callback: function () {

        Route::get('/ping', [PingController::class, 'ping']);
    });
    Route::fallback(function () {
        return response()->json([
            'error' => __('Not found'),
        ], 404);
    });

});
