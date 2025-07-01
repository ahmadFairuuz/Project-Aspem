<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/aspem', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

