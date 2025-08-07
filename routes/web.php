<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\PNBPController;
use App\Http\Controllers\AspemController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PerkaraController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\BarangRampasanController;
use App\Http\Controllers\TunggakanController;

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
    Route::get('/label/generate/{id}', [LabelController::class, 'generate'])->name('label.generate');

    Route::get('/barang-rampasan', [BarangRampasanController::class, 'index'])->name('barang-rampasan.index');
    Route::get('/barang-rampasan/aktivitas', [BarangRampasanController::class, 'aktivitas'])->name('barang-rampasan.aktivitas');
    route::delete('/barang-rampasan/delete{id}', [BarangRampasanController::class, 'destroy'])->name('barang-rampasan.destroy');
    Route::get('/barang-rampasan/export', [BarangRampasanController::class, 'export'])->name('barang-rampasan.export');
    Route::post('/barang-rampasan/import', [BarangRampasanController::class, 'import'])->name('barang-rampasan.import');

    Route::get('/perkara', [PerkaraController::class, 'index'])->name('perkara.index');
    Route::get('/perkara/create', [PerkaraController::class, 'create'])->name('perkara.create');
    Route::post('/perkara/store', [PerkaraController::class, 'store'])->name('perkara.store');
    Route::get('/perkara/export', [PerkaraController::class, 'export'])->name('perkara.export');
    Route::post('/perkara/import', [PerkaraController::class, 'import'])->name('perkara.import');
    route::get('/perkara/edit{id}', [PerkaraController::class, 'edit'])->name('perkara.edit');
    route::put('/perkara/update{id}', [PerkaraController::class, 'update'])->name('perkara.update');
    Route::delete('/perkara/delete{id}', [PerkaraController::class, 'destroy'])->name('perkara.destroy');
    Route::get('/perkara/validasi', [PerkaraController::class, 'validasi'])->name('perkara.validasi');
    Route::patch('/perkara/{id}/status', [PerkaraController::class, 'updateStatus'])->name('perkara.updateStatus');

    Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
    Route::get('/akun/edit{id}', [AkunController::class, 'edit'])->name('akun.edit');
    Route::put('/akun/update{id}', [AkunController::class, 'update'])->name('akun.update');

    Route::get('/export', [AkunController::class, 'export']);
    Route::post('/import', [AkunController::class, 'import']);

    Route::get('/pnbp', [PNBPController::class, 'index'])->name('pnbp.index');
    Route::get('/pnbp/create', [PNBPController::class, 'create'])->name('pnbp.create');
    Route::post('/pnbp/store', [PNBPController::class, 'store'])->name('pnbp.store');
    Route::get('/pnbp/export', [PNBPController::class, 'export'])->name('pnbp.export');

    Route::get('/tunggakan', [TunggakanController::class, 'index'])->name('tunggakan.index');
    Route::get('/tunggakan/create', [TunggakanController::class, 'create'])->name('tunggakan.create');
    Route::post('/tunggakan/store', [TunggakanController::class, 'store'])->name('tunggakan.store');
    Route::get('/tunggakan/{id}/edit', [TunggakanController::class, 'edit'])->name('tunggakan.edit');
    Route::put('/tunggakan/{id}', [TunggakanController::class, 'update'])->name('tunggakan.update');
    Route::delete('/tunggakan/{id}', [TunggakanController::class, 'destroy'])->name('tunggakan.destroy');
    Route::get('/tunggakan/export', [TunggakanController::class, 'export'])->name('tunggakan.export');
    Route::post('/tunggakan/import', [TunggakanController::class, 'import'])->name('tunggakan.import');
});
