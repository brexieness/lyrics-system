<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SongController;

// Public routes
Route::get('/songs', [SongController::class, 'index']);  // List public songs
Route::get('/songs/{id}', [SongController::class, 'show']);  // Show specific song

// Admin login
Route::post('/admin/login', [AuthController::class, 'login']);

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/songs', [SongController::class, 'store']);
    Route::put('/admin/songs/{id}', [SongController::class, 'update']);
    Route::delete('/admin/songs/{id}', [SongController::class, 'destroy']);
});
