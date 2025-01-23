<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator.index');
