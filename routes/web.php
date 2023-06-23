<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/calc', [\App\Http\Controllers\CalculatorController::class, 'calc'])->name('calc');
