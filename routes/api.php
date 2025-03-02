<?php

use App\Http\Controllers\API\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group( function() {
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/authenticated', [AuthController::class, 'checkUserStatus']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
