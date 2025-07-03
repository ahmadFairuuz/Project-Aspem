<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AspemController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('login');
});

Route::get('/label', [AspemController::class, 'index'])->name('label.index');
route::get('/label/create', [AspemController::class, 'create'])->name('label.create');
route::post('/label/store', [AspemController::class, 'store'])->name('label.store');
route::get('/label/edit{id}', [AspemController::class, 'edit'])->name('label.edit');
route::put('/label/update{id}', [AspemController::class, 'update'])->name('label.update');
route::delete('/label/delete{id}', [AspemController::class, 'destroy'])->name('label.destroy');