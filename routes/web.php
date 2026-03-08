<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProductController;

// Homepage / restaurantpagina
Route::get('/', [RestaurantController::class, 'index']);

// User pagina
Route::get('/user', [UserController::class, 'index']);

// Product CRUD routes
Route::resource('products', ProductController::class);