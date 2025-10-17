<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VenueController;

// LOGIN / LOGOUT
Route::post('/', [AuthController::class, 'login']);
Route::post('/olympics/logout', [AuthController::class, 'logout']);

// EVENTS
Route::post('/olympics/events/create', [EventController::class, 'store']);
Route::get('/olympics/events/list', [EventController::class, 'index']);
Route::put('/olympics/events/edit/{id}', [EventController::class, 'update']);

// PARTICIPANTS
Route::post('/olympics/participants/create', [ParticipantController::class, 'store']);
Route::get('/olympics/participants/list/{eventId}', [ParticipantController::class, 'byEvent']);
Route::delete('/olympics/participants/delete/{id}', [ParticipantController::class, 'destroy']);

// VENUES 
Route::get('/venues', [VenueController::class, 'index']); 
