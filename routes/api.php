<?php

use App\Http\Controllers\CalculatorApiController;
use Illuminate\Support\Facades\Route;

Route::post('/calculator', [CalculatorApiController::class, 'store'])->name('calculator.store');
