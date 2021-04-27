<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CurrenciesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);
Route::get('/currencies-import', [CurrenciesController::class, 'import']);
Route::post('/exchange', [CurrenciesController::class, 'exchange']);
