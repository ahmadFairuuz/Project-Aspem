<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangRampasanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PerkaraController;
use App\Http\Controllers\PNBPController;
use App\Http\Controllers\RekapBarangRampasanController;
use App\Http\Controllers\TunggakanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'prevent-back'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/barang-rampasan', [BarangRampasanController::class, 'index'])->name('barang-rampasan.index');
    Route::post('/barang-rampasan/pengambilan/{id}', [BarangRampasanController::class, 'simpanPengambilan'])->name('barang-rampasan.pengambilan');
    Route::post('/barang-rampasan/pengembalian/{id}', [BarangRampasanController::class, 'simpanPengembalian'])->name('barang-rampasan.pengembalian');

    Route::get('/perkara', [PerkaraController::class, 'index'])->name('perkara.index');
    Route::get('/perkara/export', [PerkaraController::class, 'export'])->name('perkara.export');
    Route::get('/perkara/validasi', [PerkaraController::class, 'validasi'])
        ->name('perkara.validasi')
        ->middleware('role-deny:kajati');
    Route::patch('/perkara/{id}/status', [PerkaraController::class, 'updateStatus'])
        ->name('perkara.updateStatus')
        ->middleware('role-deny:kajati');

    Route::get('/pnbp', [PNBPController::class, 'index'])->name('pnbp.index');
    Route::get('/pnbp/export', [PNBPController::class, 'export'])->name('pnbp.export');

    Route::get('/tunggakan', [TunggakanController::class, 'index'])->name('tunggakan.index');
    Route::get('/tunggakan/export', [TunggakanController::class, 'export'])->name('tunggakan.export');

    Route::get('/rekap-barang-rampasan', [RekapBarangRampasanController::class, 'index'])->name('rekap-barang-rampasan.index');
    Route::get('/rekap-barang-rampasan/export', [RekapBarangRampasanController::class, 'export'])->name('rekap-barang-rampasan.export');

    Route::middleware('role-deny:validator,kajati')->group(function () {
        route::delete('/barang-rampasan/delete{id}', [BarangRampasanController::class, 'destroy'])->name('barang-rampasan.destroy');
        Route::post('/barang-rampasan/import', [BarangRampasanController::class, 'import'])->name('barang-rampasan.import');

        Route::get('/label', [LabelController::class, 'index'])->name('label.index');
        route::get('/label/create', [LabelController::class, 'create'])->name('label.create');
        route::post('/label/store', [LabelController::class, 'store'])->name('label.store');
        route::get('/label/edit{id}', [LabelController::class, 'edit'])->name('label.edit');
        route::put('/label/update{id}', [LabelController::class, 'update'])->name('label.update');
        route::delete('/label/delete{id}', [LabelController::class, 'destroy'])->name('label.destroy');
        Route::get('/label/generate/{id}', [LabelController::class, 'generate'])->name('label.generate');

        Route::get('/perkara/create', [PerkaraController::class, 'create'])->name('perkara.create');
        Route::post('/perkara/import', [PerkaraController::class, 'import'])->name('perkara.import');
        route::get('/perkara/edit{id}', [PerkaraController::class, 'edit'])->name('perkara.edit');
        route::put('/perkara/update{id}', [PerkaraController::class, 'update'])->name('perkara.update');
        Route::delete('/perkara/delete{id}', [PerkaraController::class, 'destroy'])->name('perkara.destroy');
        Route::post('/perkara/store', [PerkaraController::class, 'store'])->name('perkara.store');

        Route::get('/pnbp/create', [PNBPController::class, 'create'])->name('pnbp.create');
        Route::post('/pnbp/store', [PNBPController::class, 'store'])->name('pnbp.store');
        Route::get('/pnbp/edit/{id}', [PNBPController::class, 'edit'])->name('pnbp.edit');
        Route::put('/pnbp/update/{id}', [PNBPController::class, 'update'])->name('pnbp.update');
        Route::delete('/pnbp/{id}', [PNBPController::class, 'destroy'])->name('pnbp.destroy');

        Route::get('/tunggakan/create', [TunggakanController::class, 'create'])->name('tunggakan.create');
        Route::post('/tunggakan/store', [TunggakanController::class, 'store'])->name('tunggakan.store');
        Route::get('/tunggakan/{id}/edit', [TunggakanController::class, 'edit'])->name('tunggakan.edit');
        Route::put('/tunggakan/{id}', [TunggakanController::class, 'update'])->name('tunggakan.update');
        Route::delete('/tunggakan/{id}', [TunggakanController::class, 'destroy'])->name('tunggakan.destroy');
        Route::post('/tunggakan/import', [TunggakanController::class, 'import'])->name('tunggakan.import');

        Route::get('/rekap-barang-rampasan/create', [RekapBarangRampasanController::class, 'create'])->name('rekap-barang-rampasan.create');
        Route::post('/rekap-barang-rampasan', [RekapBarangRampasanController::class, 'store'])->name('rekap-barang-rampasan.store');
        Route::get('/rekap-barang-rampasan/edit{id}', [RekapBarangRampasanController::class, 'edit'])->name('rekap-barang-rampasan.edit');
        Route::put('/rekap-barang-rampasan/update{id}', [RekapBarangRampasanController::class, 'update'])->name('rekap-barang-rampasan.update');
        Route::delete('/rekap-barang-rampasan/{id}', [RekapBarangRampasanController::class, 'destroy'])->name('rekap-barang-rampasan.destroy');
        Route::post('/rekap-barang-rampasan/import', [RekapBarangRampasanController::class, 'import'])->name('rekap-barang-rampasan.import');
    });

    Route::middleware('role-deny:validator,kajati,user')->group(function () {
        Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
        Route::get('/akun/edit{id}', [AkunController::class, 'edit'])->name('akun.edit');
        Route::put('/akun/update{id}', [AkunController::class, 'update'])->name('akun.update');
        Route::get('/export', [AkunController::class, 'export']);
        Route::post('/import', [AkunController::class, 'import']);
    });
});
