<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

// Existing date format examples
Route::get('/date1', [DemoController::class, 'index']);
Route::get('/example2', [DemoController::class, 'index']);
Route::get('/example3', [DemoController::class, 'index']);
Route::get('/example4', [DemoController::class, 'index']);
Route::get('/example5', [DemoController::class, 'index']);

// Date Difference Calculator
Route::get('/date-difference', [DemoController::class, 'dateDifference']);
Route::post('/date-difference', [DemoController::class, 'calculateDateDifference'])
    ->name('date.difference');

// Human-readable Date Converter
Route::get('/human-readable-date', [DemoController::class, 'humanReadable']);
Route::post('/human-readable-date', [DemoController::class, 'convertToHumanReadable'])
    ->name('human.readable');

// Timezone Date Converter
Route::get('/timezone-converter', [DemoController::class, 'timezoneConverter']);
Route::post('/timezone-converter', [DemoController::class, 'convertTimezone'])
    ->name('timezone.convert');