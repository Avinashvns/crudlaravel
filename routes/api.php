<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// import Controller
use App\Http\Controllers\GetController;
use App\Http\Controllers\UserController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Create get Api routes data in show Controller

Route::get('/d',[GetController::class,'index']);

// Create get Api routes data  in show from Table db
Route::get('/user',[UserController::class,'index']);

// Create Single data call get Api routes data  in show from Table db
Route::get('/users/{user}',[UserController::class,'show']);

// Create post Api routes data added in Table db
Route::post('/adduser',[UserController::class,'postuser']);
