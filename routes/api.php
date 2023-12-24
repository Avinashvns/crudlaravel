<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// import Controller
use App\Http\Controllers\GetController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Create get Api routes

Route::get('/d',[GetController::class,'index']);
