<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/inventaris');
});

// Hanya untuk yang BELUM login
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Hanya untuk yang SUDAH login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('inventaris', InventarisController::class)->except(['create', 'show']);
});