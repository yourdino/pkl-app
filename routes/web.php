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

// Middleware group untuk auth, lalu cek role & redirect sesuai role
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    \App\Http\Middleware\RedirectBasedOnRole::class,  // tambahkan middleware custom disini
])->group(function () {
    
    // Jika siswa atau guru login, akan diarahkan ke /dashboard oleh middleware
Route::get('/redirect', function () {
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        return redirect('/admin');
    } elseif ($user->hasRole('guru')) {
        return redirect('/guru');
    } elseif ($user->hasRole('siswa')) {
        return redirect('/siswa');
    }

    return redirect('/dashboard');
})->middleware(['auth', 'verified']);

});
