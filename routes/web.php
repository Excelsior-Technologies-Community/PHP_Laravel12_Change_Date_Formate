<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DemoController;

Route::get('/date1', [DemoController::class, 'index']);
Route::get('/example2', [DemoController::class, 'index']);
Route::get('/example3', [DemoController::class, 'index']);
Route::get('/example4', [DemoController::class, 'index']);
Route::get('/example5', [DemoController::class, 'index']);
