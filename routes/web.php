<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AspemController;
use App\Http\Controllers\BarangRampasanController;
use App\Http\Controllers\PerkaraController;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Routing\RouteGroup;

Route::get('/', [AspemController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AspemController::class, 'login'])->name('login');

Route::get('/login', [AspemController::class, 'showLoginForm'])->name('login.form');
Route::post('/logout', [AspemController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'prevent-back'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/label', [AspemController::class, 'index'])->name('label.index');
    route::get('/label/create', [AspemController::class, 'create'])->name('label.create');
    route::post('/label/store', [AspemController::class, 'store'])->name('label.store');
    route::get('/label/edit{id}', [AspemController::class, 'edit'])->name('label.edit');
    route::put('/label/update{id}', [AspemController::class, 'update'])->name('label.update');
    route::delete('/label/delete{id}', [AspemController::class, 'destroy'])->name('label.destroy');

    Route::get('/barang-rampasan', [BarangRampasanController::class, 'index'])->name('barang-rampasan.index');
    Route::get('/barang-rampasan/aktivitas', [BarangRampasanController::class, 'aktivitas'])->name('barang-rampasan.aktivitas');
    route::delete('/barang-rampasan/delete{id}', [BarangRampasanController::class, 'destroy'])->name('barang-rampasan.destroy');

    Route::get('/perkara', [PerkaraController::class, 'index'])->name('perkara.index');
    Route::get('/perkara/create', [PerkaraController::class, 'create'])->name('perkara.create');
    Route::post('/perkara/store', [PerkaraController::class, 'store'])->name('perkara.store');
});
