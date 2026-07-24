<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])
        ->name('dashboard');

    Route::resource('surat', SuratController::class);

    Route::put('/surat/{surat}/status',
    [SuratController::class,'updateStatus'])
    ->name('surat.status');

    Route::put('/surat/{surat}/upload',
    [SuratController::class,'uploadSurat'])
    ->name('surat.upload');

    Route::resource('users', UserController::class);

    Route::get('/profile', [ProfileController::class,'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class,'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class,'destroy'])
        ->name('profile.destroy');

    Route::get('/antrian', [AntrianController::class,'index'])
         ->name('antrian.index');

    Route::get('/guru/dashboard', [GuruController::class, 'dashboard'])
        ->name('guru.dashboard');

    Route::get('/orang-tua/dashboard', [OrangTuaController::class, 'dashboard'])
         ->name('ortu.dashboard');

    Route::get('/guru/riwayat', [GuruController::class,'riwayat'])
        ->name('guru.riwayat');

    Route::get('/orang-tua/riwayat', [OrangTuaController::class,'riwayat'])
        ->name('ortu.riwayat');

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');
});

require __DIR__.'/auth.php';