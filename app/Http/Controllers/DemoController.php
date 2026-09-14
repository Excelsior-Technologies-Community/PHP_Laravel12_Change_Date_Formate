<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DemoController extends Controller
{
    // Handle all date format examples and date utilities
    public function index(Request $request)
    {
        $path = $request->path();

        // Example 1: Change date format using model created_at
        if ($path === 'date1') {
            $user = User::first();

            if (!$user) {
                return response('No user found in the database.', 404);
            }

            $newDate = $user->created_at->format('d-m-Y');

            dd($newDate);
        }

        // Example 2: Convert Y-m-d H:i:s to m/d/Y
        if ($path === 'example2') {
            $date = date('Y-m-d H:i:s');

            $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)
                ->format('m/d/Y');

            dd($newDate);
        }

        // Example 3: Convert Y-m-d to m/d/Y
        if ($path === 'example3') {
            $date = '2024-03-24';

            $newDate = Carbon::createFromFormat('Y-m-d', $date)
                ->format('m/d/Y');

            dd($newDate);
        }

        // Example 4: Convert m/d/Y to Y-m-d
        if ($path === 'example4') {
            $date = '03/24/2024';

            $newDate = Carbon::createFromFormat('m/d/Y', $date)
                ->format('Y-m-d');

            dd($newDate);
        }

        // Example 5: Convert Y-m-d to d/m/Y
        if ($path === 'example5') {
            $date = '2024-03-24';

            $newDate = Carbon::createFromFormat('Y-m-d', $date)
                ->format('d/m/Y');

            dd($newDate);
        }

        abort(404);
    }

    /**
     * Date Difference Calculator
     */
    public function dateDifference()
    {
        return view('date-tools', [
            'activeTool' => 'difference',
            'result' => null,
            'data' => [],
        ]);
    }

    /**
     * Calculate difference between two dates.
     */
    public function calculateDateDifference(Request $request)
    {
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        $isReverse = $endDate->lt($startDate);

        $fromDate = $isReverse ? $endDate : $startDate;
        $toDate = $isReverse ? $startDate : $endDate;

        $totalDays = $fromDate->diffInDays($toDate);
        $totalMonths = $fromDate->diffInMonths($toDate);
        $totalYears = $fromDate->diffInYears($toDate);

        $difference = $fromDate->diff($toDate);

        $data = [
            'start_date' => $startDate->format('d-m-Y'),
            'end_date' => $endDate->format('d-m-Y'),
            'total_days' => $totalDays,
            'total_months' => $totalMonths,
            'total_years' => $totalYears,
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

    /**
     * Human-readable date and relative time tool.
     */
    public function humanReadable()
    {
        return view('date-tools', [
            'activeTool' => 'human',
            'result' => null,
            'data' => [],
        ]);
    }

    /**
     * Convert date into human-readable formats.
     */
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

    /**
     * Timezone conversion form.
     */
    public function timezoneConverter()
    {
        return view('date-tools', [
            'activeTool' => 'timezone',
            'result' => null,
            'data' => [],
        ]);
    }

    /**
     * Convert date/time between timezones.
     */
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

        $convertedDate = $date->copy()->setTimezone($request->to_timezone);

        $data = [
            'original' => $date->format('d F Y, h:i A'),
            'original_timezone' => $request->from_timezone,
            'converted' => $convertedDate->format('d F Y, h:i A'),
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
}