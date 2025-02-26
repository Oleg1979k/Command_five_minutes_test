<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendController;
use App\Http\Controllers\RecordController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/send', [SendController::class, 'send']);

Route::get('/records', [RecordController::class, 'index']);
