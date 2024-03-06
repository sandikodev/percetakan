<?php

use App\Http\Controllers\Api\LisensiController;
use App\Http\Controllers\HomePagesController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/midtrans-callback', [TransaksiController::class, 'callback']);