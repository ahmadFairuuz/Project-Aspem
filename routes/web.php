<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AspemController;

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get("/", [AspemController::class, 'index'])->name('index.index');

Route::resource('aspem', AspemController::class);