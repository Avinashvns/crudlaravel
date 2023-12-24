<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// import Controller
use Illuminate\Http\Controllers\GetController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Create get Api routes
Route::get('/demo' ,[GetController::class , 'index']);
