<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AspemController;

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/label', [AspemController::class, 'index'])->name('label.index');
route::get('/label/create', [AspemController::class, 'create'])->name('label.create');
