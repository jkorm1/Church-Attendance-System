<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\QuoteController;

// Default route for the welcome page
Route::get('/', function () {
    return view('welcome'); // This is the default landing page
});

// Route for displaying memes
Route::get('/memes', [MemeController::class, 'index']);

// Route for displaying quotes
Route::get('/quotes', [QuoteController::class, 'index']);
