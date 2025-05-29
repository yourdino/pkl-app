<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\PklController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("guru", GuruController::class);
Route::apiResource("siswa", SiswaController::class);
Route::apiResource("industri", IndustriController::class);
Route::apiResource("pkl", PklController::class);