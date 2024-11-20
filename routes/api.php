<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('restaurants', RestaurantController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('menus', MenuController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('payments', PaymentController::class);


