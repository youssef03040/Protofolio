<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $profile = User::where('is_approved', true)->first();

    return view('welcome', [
        'profile' => $profile,
    ]);
});

Route::get('/projects', function () {
    return view('projects');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
