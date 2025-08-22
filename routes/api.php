<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Users
    Route::apiResource('users', UserController::class);
    
    // Events
    Route::apiResource('events', EventController::class);
    
    // Projects
    Route::apiResource('projects', ProjectController::class);
    
    // Sponsors
    Route::apiResource('sponsors', SponsorController::class);
});