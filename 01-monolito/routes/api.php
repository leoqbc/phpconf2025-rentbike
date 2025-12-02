<?php

use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/motorcycles', [ MotorcycleController::class, 'index' ]);

Route::post('/reservations', [ ReservationController::class, 'store' ]);
