<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/home', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('welcome');
});

