<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');  // Serve the initial Blade view with the Vue app
});

// Catch-all route for Vue to handle all frontend routes
Route::get('/{any}', function () {
    return view('welcome');  // Ensure the same Blade view is used for Vue routing
})->where('any', '.*');
