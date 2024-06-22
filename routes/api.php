<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;

Route::post('login',LoginController::class);

Route::resource('users',UserController::class)
    ->only('index','show');
    
Route::resource('messages',MessageController::class)
    ->only('index','store')
    ->middleware('auth:sanctum');

