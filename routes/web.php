<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;

// Default route for the welcome page
Route::get('/', function () {
    return view('welcome'); // This is the default landing page
});

// Route for displaying memes
Route::get('/memes', [MemeController::class, 'index']);

// Route for displaying quotes
Route::get('/quotes', [QuoteController::class, 'index']);

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
