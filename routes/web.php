<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\PklController;

Route::resource('siswas', SiswaController::class);
Route::resource('gurus', GuruController::class);
Route::resource('industris', IndustriController::class);
Route::resource('pkls', PklController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
