<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DemoController extends Controller
{
    // Handle all date format examples using single index method
    public function index(Request $request)
    {
        $path = $request->path();

        // Example 1: Change date format using model created_at
        if ($path === 'date1') {
            $user = User::first();
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
            $date = "2024-03-24";
            $newDate = Carbon::createFromFormat('Y-m-d', $date)
                            ->format('m/d/Y');
            dd($newDate);
        }

        // Example 4: Convert m/d/Y to Y-m-d
        if ($path === 'example4') {
            $date = "03/24/2024";
            $newDate = Carbon::createFromFormat('m/d/Y', $date)
                            ->format('Y-m-d');
            dd($newDate);
        }

        // Example 5: Convert Y-m-d to d/m/Y
        if ($path === 'example5') {
            $date = "2024-03-24";
            $newDate = Carbon::createFromFormat('Y-m-d', $date)
                            ->format('d/m/Y');
            dd($newDate);
        }

        // Fallback
        abort(404);
    }
}
