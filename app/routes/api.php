<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('restaurants', RestaurantController::class);

Route::apiResource('menus', MenuController::class);

