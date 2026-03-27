<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GerechtController;

// ===== AUTH ROUTES =====
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== ADMIN (beveiligd met auth) =====
Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');

// ===== GERECHTEN CRUD =====
Route::resource('gerechten', GerechtController::class);

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');