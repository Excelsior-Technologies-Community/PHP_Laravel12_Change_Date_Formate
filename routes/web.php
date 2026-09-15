<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/date-difference');


/*
|--------------------------------------------------------------------------
| Existing Date Format Examples
|--------------------------------------------------------------------------
*/

Route::get('/date1', [DemoController::class, 'index']);

Route::get('/example2', [DemoController::class, 'index']);

Route::get('/example3', [DemoController::class, 'index']);

Route::get('/example4', [DemoController::class, 'index']);

Route::get('/example5', [DemoController::class, 'index']);


/*
|--------------------------------------------------------------------------
| 1. Date Difference
|--------------------------------------------------------------------------
*/

Route::get(
    '/date-difference',
    [DemoController::class, 'dateDifference']
);

Route::post(
    '/date-difference',
    [DemoController::class, 'calculateDateDifference']
)->name('date.difference');


/*
|--------------------------------------------------------------------------
| 2. Human Readable Date
|--------------------------------------------------------------------------
*/

Route::get(
    '/human-readable-date',
    [DemoController::class, 'humanReadable']
);

Route::post(
    '/human-readable-date',
    [DemoController::class, 'convertToHumanReadable']
)->name('human.readable');


/*
|--------------------------------------------------------------------------
| 3. Timezone Converter
|--------------------------------------------------------------------------
*/

Route::get(
    '/timezone-converter',
    [DemoController::class, 'timezoneConverter']
);

Route::post(
    '/timezone-converter',
    [DemoController::class, 'convertTimezone']
)->name('timezone.convert');


/*
|--------------------------------------------------------------------------
| 4. Date Format Converter
|--------------------------------------------------------------------------
*/

Route::get(
    '/format-converter',
    [DemoController::class, 'formatConverter']
);

Route::post(
    '/format-converter',
    [DemoController::class, 'convertFormat']
)->name('format.convert');


/*
|--------------------------------------------------------------------------
| 5. Add / Subtract Date
|--------------------------------------------------------------------------
*/

Route::get(
    '/date-calculator',
    [DemoController::class, 'dateCalculator']
);

Route::post(
    '/date-calculator',
    [DemoController::class, 'calculateDate']
)->name('date.calculator');


/*
|--------------------------------------------------------------------------
| 6. Age Calculator
|--------------------------------------------------------------------------
*/

Route::get(
    '/age-calculator',
    [DemoController::class, 'ageCalculator']
);

Route::post(
    '/age-calculator',
    [DemoController::class, 'calculateAge']
)->name('age.calculate');


/*
|--------------------------------------------------------------------------
| 7. Business Days
|--------------------------------------------------------------------------
*/

Route::get(
    '/business-days',
    [DemoController::class, 'businessDays']
);

Route::post(
    '/business-days',
    [DemoController::class, 'calculateBusinessDays']
)->name('business.calculate');


/*
|--------------------------------------------------------------------------
| 8. Date Information
|--------------------------------------------------------------------------
*/

Route::get(
    '/date-information',
    [DemoController::class, 'dateInformation']
);

Route::post(
    '/date-information',
    [DemoController::class, 'analyzeDate']
)->name('date.information');


/*
|--------------------------------------------------------------------------
| 9. Month Information
|--------------------------------------------------------------------------
*/

Route::get(
    '/month-information',
    [DemoController::class, 'monthInformation']
);

Route::post(
    '/month-information',
    [DemoController::class, 'analyzeMonth']
)->name('month.information');


/*
|--------------------------------------------------------------------------
| 10. Week / Quarter Information
|--------------------------------------------------------------------------
*/

Route::get(
    '/week-quarter',
    [DemoController::class, 'weekQuarter']
);

Route::post(
    '/week-quarter',
    [DemoController::class, 'analyzeWeekQuarter']
)->name('week.quarter');


/*
|--------------------------------------------------------------------------
| 11. Weekend / Weekday Checker
|--------------------------------------------------------------------------
*/

Route::get(
    '/weekend-checker',
    [DemoController::class, 'weekendChecker']
);

Route::post(
    '/weekend-checker',
    [DemoController::class, 'checkWeekend']
)->name('weekend.check');


/*
|--------------------------------------------------------------------------
| 12. Unix Timestamp Converter
|--------------------------------------------------------------------------
*/

Route::get(
    '/timestamp-converter',
    [DemoController::class, 'timestampConverter']
);

Route::post(
    '/timestamp-converter',
    [DemoController::class, 'convertTimestamp']
)->name('timestamp.convert');


/*
|--------------------------------------------------------------------------
| 13. Date Range Generator
|--------------------------------------------------------------------------
*/

Route::get(
    '/date-range',
    [DemoController::class, 'dateRange']
);

Route::post(
    '/date-range',
    [DemoController::class, 'generateDateRange']
)->name('date.range');