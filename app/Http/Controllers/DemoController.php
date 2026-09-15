<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DemoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Existing Date Format Examples
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $path = $request->path();

        if ($path === 'date1') {

            $user = User::first();

            if (!$user) {
                return response(
                    'No user found in the database.',
                    404
                );
            }

            $newDate = $user->created_at->format('d-m-Y');

            dd($newDate);
        }

        if ($path === 'example2') {

            $date = date('Y-m-d H:i:s');

            $newDate = Carbon::createFromFormat(
                'Y-m-d H:i:s',
                $date
            )->format('m/d/Y');

            dd($newDate);
        }

        if ($path === 'example3') {

            $date = '2024-03-24';

            $newDate = Carbon::createFromFormat(
                'Y-m-d',
                $date
            )->format('m/d/Y');

            dd($newDate);
        }

        if ($path === 'example4') {

            $date = '03/24/2024';

            $newDate = Carbon::createFromFormat(
                'm/d/Y',
                $date
            )->format('Y-m-d');

            dd($newDate);
        }

        if ($path === 'example5') {

            $date = '2024-03-24';

            $newDate = Carbon::createFromFormat(
                'Y-m-d',
                $date
            )->format('d/m/Y');

            dd($newDate);
        }

        abort(404);
    }

    /*
    |--------------------------------------------------------------------------
    | 1. DATE DIFFERENCE
    |--------------------------------------------------------------------------
    */

    public function dateDifference()
    {
        return view('date-tools', [
            'activeTool' => 'difference',
            'result' => null,
            'data' => [],
        ]);
    }

    public function calculateDateDifference(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $isReverse = $endDate->lt($startDate);

        $fromDate = $isReverse
            ? $endDate
            : $startDate;

        $toDate = $isReverse
            ? $startDate
            : $endDate;

        $difference = $fromDate->diff($toDate);

        $data = [
            'start_date' => $startDate->format('d-m-Y'),
            'end_date' => $endDate->format('d-m-Y'),
            'total_days' => $fromDate->diffInDays($toDate),
            'total_months' => $fromDate->diffInMonths($toDate),
            'total_years' => $fromDate->diffInYears($toDate),
            'years' => $difference->y,
            'months' => $difference->m,
            'days' => $difference->d,
        ];

        return view('date-tools', [
            'activeTool' => 'difference',
            'result' => 'difference',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 2. HUMAN READABLE
    |--------------------------------------------------------------------------
    */

    public function humanReadable()
    {
        return view('date-tools', [
            'activeTool' => 'human',
            'result' => null,
            'data' => [],
        ]);
    }

    public function convertToHumanReadable(Request $request)
    {
        $request->validate([
            'date_time' => ['required', 'date'],
        ]);

        $date = Carbon::parse($request->date_time);

        $data = [
            'original' => $date->format('Y-m-d H:i:s'),
            'full_date' => $date->format('d F Y'),
            'short_date' => $date->format('d-m-Y'),
            'us_date' => $date->format('m/d/Y'),
            'long_date' => $date->format('F d, Y'),
            'day_date' => $date->format('l, d F Y'),
            'time' => $date->format('h:i A'),
            'relative' => $date->diffForHumans(),
        ];

        return view('date-tools', [
            'activeTool' => 'human',
            'result' => 'human',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 3. TIMEZONE CONVERTER
    |--------------------------------------------------------------------------
    */

    public function timezoneConverter()
    {
        return view('date-tools', [
            'activeTool' => 'timezone',
            'result' => null,
            'data' => [],
        ]);
    }

    public function convertTimezone(Request $request)
    {
        $request->validate([
            'date_time' => ['required', 'date'],
            'from_timezone' => ['required', 'timezone'],
            'to_timezone' => ['required', 'timezone'],
        ]);

        $date = Carbon::createFromFormat(
            'Y-m-d\TH:i',
            $request->date_time,
            $request->from_timezone
        );

        $convertedDate = $date->copy()
            ->setTimezone($request->to_timezone);

        $data = [
            'original' => $date->format(
                'd F Y, h:i A'
            ),
            'original_timezone' => $request->from_timezone,
            'converted' => $convertedDate->format(
                'd F Y, h:i A'
            ),
            'converted_timezone' => $request->to_timezone,
            'original_offset' => $date->format('P'),
            'converted_offset' => $convertedDate->format('P'),
        ];

        return view('date-tools', [
            'activeTool' => 'timezone',
            'result' => 'timezone',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 4. DATE FORMAT CONVERTER
    |--------------------------------------------------------------------------
    */

    public function formatConverter()
    {
        return view('date-tools', [
            'activeTool' => 'format',
            'result' => null,
            'data' => [],
        ]);
    }

    public function convertFormat(Request $request)
    {
        $request->validate([
            'date' => ['required', 'string'],
            'from_format' => ['required', 'string'],
            'to_format' => ['required', 'string'],
        ]);

        try {

            $date = Carbon::createFromFormat(
                $request->from_format,
                $request->date
            );

            $data = [
                'input' => $request->date,
                'from_format' => $request->from_format,
                'to_format' => $request->to_format,
                'result' => $date->format(
                    $request->to_format
                ),
            ];

        } catch (\Throwable $e) {

            return back()
                ->withErrors([
                    'date' =>
                        'The supplied date does not match the selected format.',
                ])
                ->withInput();
        }

        return view('date-tools', [
            'activeTool' => 'format',
            'result' => 'format',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 5. DATE ADD / SUBTRACT
    |--------------------------------------------------------------------------
    */

    public function dateCalculator()
    {
        return view('date-tools', [
            'activeTool' => 'calculator',
            'result' => null,
            'data' => [],
        ]);
    }

    public function calculateDate(Request $request)
    {
        $request->validate([
            'date' => ['required', 'date'],

            'operation' => [
                'required',
                'in:add,subtract',
            ],

            'amount' => [
                'required',
                'integer',
                'min:0',
            ],

            'unit' => [
                'required',
                'in:days,weeks,months,years,hours,minutes',
            ],
        ]);

        $date = Carbon::parse($request->date);

        $amount = (int) $request->amount;

        if ($request->operation === 'add') {

            $result = match ($request->unit) {

                'days' => $date->copy()->addDays($amount),

                'weeks' => $date->copy()->addWeeks($amount),

                'months' => $date->copy()->addMonths($amount),

                'years' => $date->copy()->addYears($amount),

                'hours' => $date->copy()->addHours($amount),

                'minutes' => $date->copy()->addMinutes($amount),

            };

        } else {

            $result = match ($request->unit) {

                'days' => $date->copy()->subDays($amount),

                'weeks' => $date->copy()->subWeeks($amount),

                'months' => $date->copy()->subMonths($amount),

                'years' => $date->copy()->subYears($amount),

                'hours' => $date->copy()->subHours($amount),

                'minutes' => $date->copy()->subMinutes($amount),

            };
        }

        $data = [
            'original' => $date->format(
                'd F Y, h:i A'
            ),

            'operation' => ucfirst(
                $request->operation
            ),

            'amount' => $amount,

            'unit' => $request->unit,

            'result' => $result->format(
                'd F Y, h:i A'
            ),
        ];

        return view('date-tools', [
            'activeTool' => 'calculator',
            'result' => 'calculator',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 6. AGE CALCULATOR
    |--------------------------------------------------------------------------
    */

    public function ageCalculator()
    {
        return view('date-tools', [
            'activeTool' => 'age',
            'result' => null,
            'data' => [],
        ]);
    }

    public function calculateAge(Request $request)
    {
        $request->validate([
            'birth_date' => [
                'required',
                'date',
            ],

            'calculation_date' => [
                'required',
                'date',
            ],
        ]);

        $birthDate = Carbon::parse(
            $request->birth_date
        )->startOfDay();

        $calculationDate = Carbon::parse(
            $request->calculation_date
        )->startOfDay();

        /*
        |--------------------------------------------------------------------------
        | Birth date cannot be after calculation date
        |--------------------------------------------------------------------------
        */

        if ($birthDate->gt($calculationDate)) {

            return back()
                ->withInput()
                ->withErrors([
                    'birth_date' =>
                        'Birth date cannot be after the calculation date.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate age
        |--------------------------------------------------------------------------
        */

        $age = $birthDate->diff(
            $calculationDate
        );

        $totalDays = $birthDate->diffInDays(
            $calculationDate
        );

        $data = [
            'birth_date' =>
                $birthDate->format('d-m-Y'),

            'calculation_date' =>
                $calculationDate->format('d-m-Y'),

            'years' => $age->y,

            'months' => $age->m,

            'days' => $age->d,

            'total_days' => $totalDays,
        ];

        return view('date-tools', [
            'activeTool' => 'age',
            'result' => 'age',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 7. BUSINESS DAYS
    |--------------------------------------------------------------------------
    */

    public function businessDays()
    {
        return view('date-tools', [
            'activeTool' => 'business',
            'result' => null,
            'data' => [],
        ]);
    }

    public function calculateBusinessDays(Request $request)
    {
        $request->validate([
            'start_date' => [
                'required',
                'date',
            ],

            'end_date' => [
                'required',
                'date',
            ],
        ]);

        $start = Carbon::parse(
            $request->start_date
        );

        $end = Carbon::parse(
            $request->end_date
        );

        $from = $start->copy()->startOfDay();

        $to = $end->copy()->startOfDay();

        if ($from->gt($to)) {
            [$from, $to] = [$to, $from];
        }

        $businessDays = 0;

        $weekendDays = 0;

        $current = $from->copy();

        while ($current->lte($to)) {

            if ($current->isWeekday()) {

                $businessDays++;

            } else {

                $weekendDays++;
            }

            $current->addDay();
        }

        $data = [
            'start_date' =>
                $start->format('d-m-Y'),

            'end_date' =>
                $end->format('d-m-Y'),

            'business_days' =>
                $businessDays,

            'weekend_days' =>
                $weekendDays,

            'total_days' =>
                $from->diffInDays($to) + 1,
        ];

        return view('date-tools', [
            'activeTool' => 'business',
            'result' => 'business',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 8. DATE INFORMATION
    |--------------------------------------------------------------------------
    */

    public function dateInformation()
    {
        return view('date-tools', [
            'activeTool' => 'info',
            'result' => null,
            'data' => [],
        ]);
    }

    public function analyzeDate(Request $request)
    {
        $request->validate([
            'date' => [
                'required',
                'date',
            ],
        ]);

        $date = Carbon::parse(
            $request->date
        );

        $data = [
            'date' =>
                $date->format('d F Y'),

            'day_name' =>
                $date->format('l'),

            'day_number' =>
                $date->day,

            'day_of_year' =>
                $date->dayOfYear,

            'month' =>
                $date->format('F'),

            'month_number' =>
                $date->month,

            'year' =>
                $date->year,

            'week_of_year' =>
                $date->weekOfYear,

            'quarter' =>
                $date->quarter,

            'is_weekend' =>
                $date->isWeekend(),

            'is_weekday' =>
                $date->isWeekday(),

            'is_today' =>
                $date->isToday(),
        ];

        return view('date-tools', [
            'activeTool' => 'info',
            'result' => 'info',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 9. MONTH INFORMATION
    |--------------------------------------------------------------------------
    */

    public function monthInformation()
    {
        return view('date-tools', [
            'activeTool' => 'month',
            'result' => null,
            'data' => [],
        ]);
    }

    public function analyzeMonth(Request $request)
    {
        $request->validate([
            'month' => [
                'required',
                'date',
            ],
        ]);

        $date = Carbon::parse(
            $request->month
        );

        $start = $date->copy()
            ->startOfMonth();

        $end = $date->copy()
            ->endOfMonth();

        $data = [
            'month' =>
                $date->format('F Y'),

            'days_in_month' =>
                $date->daysInMonth,

            'start_date' =>
                $start->format('d F Y'),

            'end_date' =>
                $end->format('d F Y'),

            'start_day' =>
                $start->format('l'),

            'end_day' =>
                $end->format('l'),

            'is_leap_year' =>
                $date->isLeapYear(),
        ];

        return view('date-tools', [
            'activeTool' => 'month',
            'result' => 'month',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 10. WEEK / QUARTER
    |--------------------------------------------------------------------------
    */

    public function weekQuarter()
    {
        return view('date-tools', [
            'activeTool' => 'week',
            'result' => null,
            'data' => [],
        ]);
    }

    public function analyzeWeekQuarter(Request $request)
    {
        $request->validate([
            'date' => [
                'required',
                'date',
            ],
        ]);

        $date = Carbon::parse(
            $request->date
        );

        $data = [
            'date' =>
                $date->format('d F Y'),

            'week_number' =>
                $date->weekOfYear,

            'week_start' =>
                $date->copy()
                    ->startOfWeek()
                    ->format('d F Y'),

            'week_end' =>
                $date->copy()
                    ->endOfWeek()
                    ->format('d F Y'),

            'quarter' =>
                $date->quarter,

            'quarter_name' =>
                'Q' . $date->quarter,

            'quarter_start' =>
                $date->copy()
                    ->startOfQuarter()
                    ->format('d F Y'),

            'quarter_end' =>
                $date->copy()
                    ->endOfQuarter()
                    ->format('d F Y'),

            'year' =>
                $date->year,
        ];

        return view('date-tools', [
            'activeTool' => 'week',
            'result' => 'week',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 11. WEEKEND / WEEKDAY
    |--------------------------------------------------------------------------
    */

    public function weekendChecker()
    {
        return view('date-tools', [
            'activeTool' => 'weekend',
            'result' => null,
            'data' => [],
        ]);
    }

    public function checkWeekend(Request $request)
    {
        $request->validate([
            'date' => [
                'required',
                'date',
            ],
        ]);

        $date = Carbon::parse(
            $request->date
        );

        $data = [
            'date' =>
                $date->format('d F Y'),

            'day' =>
                $date->format('l'),

            'is_weekend' =>
                $date->isWeekend(),

            'is_weekday' =>
                $date->isWeekday(),
        ];

        return view('date-tools', [
            'activeTool' => 'weekend',
            'result' => 'weekend',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 12. UNIX TIMESTAMP
    |--------------------------------------------------------------------------
    */

    public function timestampConverter()
    {
        return view('date-tools', [
            'activeTool' => 'timestamp',
            'result' => null,
            'data' => [],
        ]);
    }

    public function convertTimestamp(Request $request)
    {
        $request->validate([
            'timestamp' => [
                'required',
                'integer',
            ],
        ]);

        try {

            $timestamp = (int) $request->timestamp;

            /*
            |--------------------------------------------------------------------------
            | Support milliseconds and seconds
            |--------------------------------------------------------------------------
            */

            if (abs($timestamp) >= 100000000000) {

                $date = Carbon::createFromTimestampMs(
                    $timestamp
                );

                $unit = 'milliseconds';

            } else {

                $date = Carbon::createFromTimestamp(
                    $timestamp
                );

                $unit = 'seconds';
            }

            $data = [
                'timestamp' =>
                    $request->timestamp,

                'unit' =>
                    $unit,

                'date' =>
                    $date->format('d F Y'),

                'time' =>
                    $date->format('h:i:s A'),

                'full' =>
                    $date->format('Y-m-d H:i:s'),

                'timezone' =>
                    $date->getTimezone()->getName(),
            ];

        } catch (\Throwable $e) {

            return back()
                ->withErrors([
                    'timestamp' =>
                        'Invalid Unix timestamp.',
                ])
                ->withInput();
        }

        return view('date-tools', [
            'activeTool' => 'timestamp',
            'result' => 'timestamp',
            'data' => $data,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 13. DATE RANGE
    |--------------------------------------------------------------------------
    */

    public function dateRange()
    {
        return view('date-tools', [
            'activeTool' => 'range',
            'result' => null,
            'data' => [],
        ]);
    }

    public function generateDateRange(Request $request)
    {
        $request->validate([
            'start_date' => [
                'required',
                'date',
            ],

            'end_date' => [
                'required',
                'date',
            ],
        ]);

        $start = Carbon::parse(
            $request->start_date
        );

        $end = Carbon::parse(
            $request->end_date
        );

        if ($start->gt($end)) {
            [$start, $end] = [$end, $start];
        }

        $dates = [];

        $current = $start->copy();

        while ($current->lte($end)) {

            $dates[] = [
                'date' =>
                    $current->format('d-m-Y'),

                'day' =>
                    $current->format('l'),

                'weekend' =>
                    $current->isWeekend(),
            ];

            $current->addDay();

            /*
            |--------------------------------------------------------------------------
            | Maximum 366 generated dates
            |--------------------------------------------------------------------------
            */

            if (count($dates) >= 366) {
                break;
            }
        }

        $data = [
            'start_date' =>
                $start->format('d-m-Y'),

            'end_date' =>
                $end->format('d-m-Y'),

            'total' =>
                count($dates),

            'dates' =>
                $dates,
        ];

        return view('date-tools', [
            'activeTool' => 'range',
            'result' => 'range',
            'data' => $data,
        ]);
    }
}