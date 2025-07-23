<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::post('auth/register', [AuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::get('owner/properties',
            [\App\Http\Controllers\Owner\PropertyController::class, 'index']);
        Route::get('user/bookings',
            [\App\Http\Controllers\User\BookingController::class, 'index']);

        Route::post('owner/properties',
            [\App\Http\Controllers\Owner\PropertyController::class, 'store']);
    });
});
