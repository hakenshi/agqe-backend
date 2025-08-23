<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::post('/login', [AuthController::class, 'login']);

// Public routes
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{event}', [EventController::class, 'show']);
Route::get('/events/slug/{slug}', [EventController::class, 'showBySlug']);
Route::get('/sponsors', [SponsorController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get("/projects", [ProjectController::class, 'index']);
Route::get("/projects/{slug}", [ProjectController::class, 'show']);
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Users
    Route::apiResource('users', UserController::class)->except(['index', 'show']);
    
    // Events
    Route::apiResource('events', EventController::class)->except(['index', 'show']);
    
    // Projects
    Route::apiResource('projects', ProjectController::class)->except(['index', 'show']);
    
    // Sponsors
    Route::apiResource('sponsors', SponsorController::class)->except(['index']);
    
    // Donations
    Route::apiResource('donations', DonationController::class)->only(['index', 'store']);
});