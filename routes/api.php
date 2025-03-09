<?php

use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;




Route::post('signup',[AuthController::class,'signup']);

Route::post('logout',[AuthController::class,'logout'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
