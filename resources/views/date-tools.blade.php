<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laravel 12 Date & Time Tools</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f4f6f9;
        }

        .navbar-brand {
            font-weight: 600;
        }

        .tool-card,
        .result-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .feature-card {
            transition: 0.2s;
            border-radius: 12px;
            border: 2px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-3px);
        }

        .active-feature {
            border-color: #0d6efd !important;
            background: #f0f6ff;
        }

        .tool-icon {
            font-size: 30px;
        }

        .footer {
            margin-top: 75px;
            padding: 25px 0;
            background: #212529;
            color: white;
        }

        .date-list {
            max-height: 450px;
            overflow-y: auto;
        }

        .result-number {
            font-size: 30px;
            font-weight: 700;
        }

        .feature-card h6 {
            color: #212529;
        }

    </style>

</head>


<body>


<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a
            class="navbar-brand"
            href="{{ url('/date-difference') }}"
        >
            Laravel 12 Date & Time Tools
        </a>

    </div>

</nav>


<div class="container py-5">


    <!-- ===================================================== -->
    <!-- HEADER -->
    <!-- ===================================================== -->

    <div class="text-center mb-5">

        <h1 class="fw-bold">
            📅 Date & Time Utilities
        </h1>

        <p class="text-muted">
            Laravel 12 Carbon Date Formatting and Conversion Toolkit
        </p>

    </div>


    <!-- ===================================================== -->
    <!-- TOOL NAVIGATION -->
    <!-- ===================================================== -->

    <div class="row g-3 mb-5">


        <!-- 1 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/date-difference') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'difference' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">📅</div>

                        <h6 class="mt-2">
                            Date Difference
                        </h6>

                        <small class="text-muted">
                            Compare dates
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 2 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/human-readable-date') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'human' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">🕐</div>

                        <h6 class="mt-2">
                            Human Readable
                        </h6>

                        <small class="text-muted">
                            Readable dates
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 3 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/timezone-converter') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'timezone' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">🌍</div>

                        <h6 class="mt-2">
                            Timezone
                        </h6>

                        <small class="text-muted">
                            Convert timezone
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 4 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/format-converter') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'format' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">🔄</div>

                        <h6 class="mt-2">
                            Format Converter
                        </h6>

                        <small class="text-muted">
                            Change date format
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 5 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/date-calculator') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'calculator' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">➕</div>

                        <h6 class="mt-2">
                            Date Calculator
                        </h6>

                        <small class="text-muted">
                            Add / subtract
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 6 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/age-calculator') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'age' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">🎂</div>

                        <h6 class="mt-2">
                            Age Calculator
                        </h6>

                        <small class="text-muted">
                            Calculate age
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 7 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/business-days') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'business' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">💼</div>

                        <h6 class="mt-2">
                            Business Days
                        </h6>

                        <small class="text-muted">
                            Working days
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 8 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/date-information') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'info' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">🔍</div>

                        <h6 class="mt-2">
                            Date Information
                        </h6>

                        <small class="text-muted">
                            Analyze date
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 9 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/month-information') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'month' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">🗓️</div>

                        <h6 class="mt-2">
                            Month Information
                        </h6>

                        <small class="text-muted">
                            Month analysis
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 10 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/week-quarter') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'week' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">🔢</div>

                        <h6 class="mt-2">
                            Week & Quarter
                        </h6>

                        <small class="text-muted">
                            Week / quarter
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 11 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/weekend-checker') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'weekend' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">🌞</div>

                        <h6 class="mt-2">
                            Weekend Checker
                        </h6>

                        <small class="text-muted">
                            Weekend / weekday
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 12 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/timestamp-converter') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'timestamp' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">⏱️</div>

                        <h6 class="mt-2">
                            Unix Timestamp
                        </h6>

                        <small class="text-muted">
                            Timestamp conversion
                        </small>

                    </div>

                </div>

            </a>

        </div>


        <!-- 13 -->

        <div class="col-md-4 col-lg-3">

            <a
                href="{{ url('/date-range') }}"
                class="text-decoration-none"
            >

                <div class="card feature-card h-100
                    {{ $activeTool === 'range' ? 'active-feature' : '' }}">

                    <div class="card-body text-center">

                        <div class="tool-icon">📋</div>

                        <h6 class="mt-2">
                            Date Range
                        </h6>

                        <small class="text-muted">
                            Generate dates
                        </small>

                    </div>

                </div>

            </a>

        </div>

    </div>


    <!-- ===================================================== -->
    <!-- VALIDATION -->
    <!-- ===================================================== -->

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>
                Please fix the following errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- ===================================================== -->
    <!-- 1. DATE DIFFERENCE -->
    <!-- ===================================================== -->

    @if ($activeTool === 'difference')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    📅 Date Difference Calculator
                </h3>

                <p class="text-muted">
                    Calculate the difference between two dates.
                </p>

                <form
                    method="POST"
                    action="{{ route('date.difference') }}"
                >

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Start Date
                            </label>

                            <input
                                type="date"
                                name="start_date"
                                class="form-control"
                                value="{{ old('start_date') }}"
                                required
                            >

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                End Date
                            </label>

                            <input
                                type="date"
                                name="end_date"
                                class="form-control"
                                value="{{ old('end_date') }}"
                                required
                            >

                        </div>

                    </div>

                    <button class="btn btn-primary">
                        Calculate Difference
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'difference')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <h4>
                        Calculation Result
                    </h4>

                    <div class="row g-3 mt-2">

                        <div class="col-md-4">

                            <div class="border rounded p-3">
                                Start:
                                <strong>
                                    {{ $data['start_date'] }}
                                </strong>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">
                                End:
                                <strong>
                                    {{ $data['end_date'] }}
                                </strong>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">
                                Days:
                                <strong>
                                    {{ $data['total_days'] }}
                                </strong>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">
                                Months:
                                <strong>
                                    {{ $data['total_months'] }}
                                </strong>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">
                                Years:
                                <strong>
                                    {{ $data['total_years'] }}
                                </strong>
                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">
                                Detailed:
                                <strong>
                                    {{ $data['years'] }}
                                    years,
                                    {{ $data['months'] }}
                                    months,
                                    {{ $data['days'] }}
                                    days
                                </strong>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 2. HUMAN READABLE -->
    <!-- ===================================================== -->

    @if ($activeTool === 'human')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    🕐 Human-Readable Date Converter
                </h3>

                <form
                    method="POST"
                    action="{{ route('human.readable') }}"
                    class="mt-3"
                >

                    @csrf

                    <input
                        type="datetime-local"
                        name="date_time"
                        class="form-control mb-3"
                        value="{{ old('date_time') }}"
                        required
                    >

                    <button class="btn btn-primary">
                        Convert Date
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'human')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <h4>
                        Converted Date Formats
                    </h4>

                    <table class="table table-bordered mt-3">

                        <tr>
                            <th>Original</th>
                            <td>{{ $data['original'] }}</td>
                        </tr>

                        <tr>
                            <th>Full Date</th>
                            <td>{{ $data['full_date'] }}</td>
                        </tr>

                        <tr>
                            <th>Short Date</th>
                            <td>{{ $data['short_date'] }}</td>
                        </tr>

                        <tr>
                            <th>US Date</th>
                            <td>{{ $data['us_date'] }}</td>
                        </tr>

                        <tr>
                            <th>Long Date</th>
                            <td>{{ $data['long_date'] }}</td>
                        </tr>

                        <tr>
                            <th>Day & Date</th>
                            <td>{{ $data['day_date'] }}</td>
                        </tr>

                        <tr>
                            <th>Time</th>
                            <td>{{ $data['time'] }}</td>
                        </tr>

                        <tr>
                            <th>Relative</th>
                            <td>{{ $data['relative'] }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 3. TIMEZONE -->
    <!-- ===================================================== -->

    @if ($activeTool === 'timezone')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    🌍 Timezone Converter
                </h3>

                <form
                    method="POST"
                    action="{{ route('timezone.convert') }}"
                    class="mt-3"
                >

                    @csrf

                    <label class="form-label">
                        Date & Time
                    </label>

                    <input
                        type="datetime-local"
                        name="date_time"
                        class="form-control mb-3"
                        value="{{ old('date_time') }}"
                        required
                    >

                    <div class="row">

                        <div class="col-md-6">

                            <label class="form-label">
                                From
                            </label>

                            <select
                                name="from_timezone"
                                class="form-select"
                            >

                                <option value="Asia/Kolkata">
                                    Asia/Kolkata
                                </option>

                                <option value="UTC">
                                    UTC
                                </option>

                                <option value="America/New_York">
                                    America/New_York
                                </option>

                                <option value="Europe/London">
                                    Europe/London
                                </option>

                                <option value="Asia/Tokyo">
                                    Asia/Tokyo
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                To
                            </label>

                            <select
                                name="to_timezone"
                                class="form-select"
                            >

                                <option value="UTC">
                                    UTC
                                </option>

                                <option value="Asia/Kolkata">
                                    Asia/Kolkata
                                </option>

                                <option value="America/New_York">
                                    America/New_York
                                </option>

                                <option value="Europe/London">
                                    Europe/London
                                </option>

                                <option value="Asia/Tokyo">
                                    Asia/Tokyo
                                </option>

                            </select>

                        </div>

                    </div>

                    <button class="btn btn-primary mt-3">
                        Convert Timezone
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'timezone')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <h4>
                        Timezone Result
                    </h4>

                    <div class="row g-3 mt-2">

                        <div class="col-md-6">

                            <div class="border rounded p-3">

                                <h5>
                                    Original
                                </h5>

                                {{ $data['original'] }}

                                <br>

                                {{ $data['original_timezone'] }}

                                <br>

                                Offset:
                                {{ $data['original_offset'] }}

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="border rounded p-3">

                                <h5>
                                    Converted
                                </h5>

                                {{ $data['converted'] }}

                                <br>

                                {{ $data['converted_timezone'] }}

                                <br>

                                Offset:
                                {{ $data['converted_offset'] }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 4. FORMAT -->
    <!-- ===================================================== -->

    @if ($activeTool === 'format')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    🔄 Date Format Converter
                </h3>

                <form
                    method="POST"
                    action="{{ route('format.convert') }}"
                    class="mt-3"
                >

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Date
                        </label>

                        <input
                            type="text"
                            name="date"
                            class="form-control"
                            placeholder="2026-09-14"
                            value="{{ old('date') }}"
                            required
                        >

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <label class="form-label">
                                From Format
                            </label>

                            <select
                                name="from_format"
                                class="form-select"
                            >

                                <option value="Y-m-d">
                                    Y-m-d
                                </option>

                                <option value="d/m/Y">
                                    d/m/Y
                                </option>

                                <option value="m/d/Y">
                                    m/d/Y
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">
                                To Format
                            </label>

                            <select
                                name="to_format"
                                class="form-select"
                            >

                                <option value="d/m/Y">
                                    d/m/Y
                                </option>

                                <option value="m/d/Y">
                                    m/d/Y
                                </option>

                                <option value="F d, Y">
                                    F d, Y
                                </option>

                                <option value="d F Y">
                                    d F Y
                                </option>

                                <option value="l, d F Y">
                                    l, d F Y
                                </option>

                            </select>

                        </div>

                    </div>

                    <button class="btn btn-primary mt-3">
                        Convert Format
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'format')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <h4>
                        Format Conversion Result
                    </h4>

                    <div class="alert alert-success mt-3">

                        {{ $data['input'] }}

                        →

                        <strong>
                            {{ $data['result'] }}
                        </strong>

                    </div>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 5. DATE CALCULATOR -->
    <!-- ===================================================== -->

    @if ($activeTool === 'calculator')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    ➕ Date Add / Subtract Calculator
                </h3>

                <form
                    method="POST"
                    action="{{ route('date.calculator') }}"
                >

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Starting Date
                        </label>

                        <input
                            type="datetime-local"
                            name="date"
                            class="form-control"
                            value="{{ old('date') }}"
                            required
                        >

                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Operation
                            </label>

                            <select
                                name="operation"
                                class="form-select"
                            >

                                <option value="add">
                                    Add
                                </option>

                                <option value="subtract">
                                    Subtract
                                </option>

                            </select>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Amount
                            </label>

                            <input
                                type="number"
                                name="amount"
                                class="form-control"
                                min="0"
                                value="1"
                                required
                            >

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Unit
                            </label>

                            <select
                                name="unit"
                                class="form-select"
                            >

                                <option value="days">
                                    Days
                                </option>

                                <option value="weeks">
                                    Weeks
                                </option>

                                <option value="months">
                                    Months
                                </option>

                                <option value="years">
                                    Years
                                </option>

                                <option value="hours">
                                    Hours
                                </option>

                                <option value="minutes">
                                    Minutes
                                </option>

                            </select>

                        </div>

                    </div>

                    <button class="btn btn-primary">
                        Calculate Date
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'calculator')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <h4>
                        Result
                    </h4>

                    <div class="alert alert-success mt-3">

                        Original:
                        <strong>
                            {{ $data['original'] }}
                        </strong>

                        <br>

                        {{ $data['operation'] }}
                        {{ $data['amount'] }}
                        {{ $data['unit'] }}

                        <br>

                        Result:
                        <strong>
                            {{ $data['result'] }}
                        </strong>

                    </div>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 6. AGE -->
    <!-- ===================================================== -->

    @if ($activeTool === 'age')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    🎂 Age Calculator
                </h3>

                <form
                    method="POST"
                    action="{{ route('age.calculate') }}"
                >

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Birth Date
                            </label>

                            <input
                                type="date"
                                name="birth_date"
                                class="form-control"
                                value="{{ old('birth_date') }}"
                                max="{{ now()->format('Y-m-d') }}"
                                required
                            >

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Calculate As Of
                            </label>

                            <!-- IMPORTANT:
                                 Controller expects calculation_date -->
                            <input
                                type="date"
                                name="calculation_date"
                                class="form-control"
                                value="{{ old(
                                    'calculation_date',
                                    now()->format('Y-m-d')
                                ) }}"
                                required
                            >

                        </div>

                    </div>

                    <button class="btn btn-primary">
                        Calculate Age
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'age')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <h4>
                        🎂 Age Result
                    </h4>

                    <div class="row g-3 mt-2">

                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">

                                <div class="result-number">
                                    {{ $data['years'] }}
                                </div>

                                Years

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">

                                <div class="result-number">
                                    {{ $data['months'] }}
                                </div>

                                Months

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">

                                <div class="result-number">
                                    {{ $data['days'] }}
                                </div>

                                Days

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">

                                <div class="result-number">
                                    {{ $data['total_days'] }}
                                </div>

                                Total Days

                            </div>

                        </div>

                    </div>


                    <div class="alert alert-info mt-4 mb-0">

                        Birth Date:
                        <strong>
                            {{ $data['birth_date'] }}
                        </strong>

                        <br>

                        Calculation Date:
                        <strong>
                            {{ $data['calculation_date'] }}
                        </strong>

                    </div>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 7. BUSINESS DAYS -->
    <!-- ===================================================== -->

    @if ($activeTool === 'business')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    💼 Business Days Calculator
                </h3>

                <p class="text-muted">
                    Count weekdays and weekend days between dates.
                </p>

                <form
                    method="POST"
                    action="{{ route('business.calculate') }}"
                >

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Start Date
                            </label>

                            <input
                                type="date"
                                name="start_date"
                                class="form-control"
                                value="{{ old('start_date') }}"
                                required
                            >

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                End Date
                            </label>

                            <input
                                type="date"
                                name="end_date"
                                class="form-control"
                                value="{{ old('end_date') }}"
                                required
                            >

                        </div>

                    </div>

                    <button class="btn btn-primary">
                        Calculate Business Days
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'business')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <h4>
                        Business Day Result
                    </h4>

                    <div class="row g-3 mt-2">

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                Total Days:
                                <strong>
                                    {{ $data['total_days'] }}
                                </strong>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                Business Days:
                                <strong>
                                    {{ $data['business_days'] }}
                                </strong>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                Weekend Days:
                                <strong>
                                    {{ $data['weekend_days'] }}
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 8. DATE INFORMATION -->
    <!-- ===================================================== -->

    @if ($activeTool === 'info')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    🔍 Date Information Analyzer
                </h3>

                <form
                    method="POST"
                    action="{{ route('date.information') }}"
                >

                    @csrf

                    <input
                        type="date"
                        name="date"
                        class="form-control mb-3"
                        value="{{ old('date') }}"
                        required
                    >

                    <button class="btn btn-primary">
                        Analyze Date
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'info')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <h4>
                        Date Information
                    </h4>

                    <table class="table table-bordered mt-3">

                        <tr>
                            <th>Date</th>
                            <td>{{ $data['date'] }}</td>
                        </tr>

                        <tr>
                            <th>Day</th>
                            <td>{{ $data['day_name'] }}</td>
                        </tr>

                        <tr>
                            <th>Day Number</th>
                            <td>{{ $data['day_number'] }}</td>
                        </tr>

                        <tr>
                            <th>Day of Year</th>
                            <td>{{ $data['day_of_year'] }}</td>
                        </tr>

                        <tr>
                            <th>Month</th>

                            <td>
                                {{ $data['month'] }}
                                (#{{ $data['month_number'] }})
                            </td>

                        </tr>

                        <tr>
                            <th>Year</th>
                            <td>{{ $data['year'] }}</td>
                        </tr>

                        <tr>
                            <th>Week</th>
                            <td>{{ $data['week_of_year'] }}</td>
                        </tr>

                        <tr>
                            <th>Quarter</th>
                            <td>Q{{ $data['quarter'] }}</td>
                        </tr>

                        <tr>
                            <th>Weekend?</th>

                            <td>
                                {{ $data['is_weekend'] ? 'Yes' : 'No' }}
                            </td>

                        </tr>

                        <tr>
                            <th>Weekday?</th>

                            <td>
                                {{ $data['is_weekday'] ? 'Yes' : 'No' }}
                            </td>

                        </tr>

                        <tr>
                            <th>Today?</th>

                            <td>
                                {{ $data['is_today'] ? 'Yes' : 'No' }}
                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 9. MONTH INFORMATION -->
    <!-- ===================================================== -->

    @if ($activeTool === 'month')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    🗓️ Month Information
                </h3>

                <form
                    method="POST"
                    action="{{ route('month.information') }}"
                >

                    @csrf

                    <input
                        type="month"
                        name="month"
                        class="form-control mb-3"
                        value="{{ old('month') }}"
                        required
                    >

                    <button class="btn btn-primary">
                        Analyze Month
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'month')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <h4>
                        {{ $data['month'] }}
                    </h4>

                    <div class="row g-3 mt-2">

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                Days:
                                <strong>
                                    {{ $data['days_in_month'] }}
                                </strong>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                Starts:
                                <strong>
                                    {{ $data['start_date'] }}
                                </strong>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                Ends:
                                <strong>
                                    {{ $data['end_date'] }}
                                </strong>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                Start Day:
                                <strong>
                                    {{ $data['start_day'] }}
                                </strong>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                End Day:
                                <strong>
                                    {{ $data['end_day'] }}
                                </strong>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded p-3">

                                Leap Year:
                                <strong>
                                    {{ $data['is_leap_year'] ? 'Yes' : 'No' }}
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 10. WEEK / QUARTER -->
    <!-- ===================================================== -->

    @if ($activeTool === 'week')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    🔢 Week & Quarter Information
                </h3>

                <form
                    method="POST"
                    action="{{ route('week.quarter') }}"
                >

                    @csrf

                    <input
                        type="date"
                        name="date"
                        class="form-control mb-3"
                        value="{{ old('date') }}"
                        required
                    >

                    <button class="btn btn-primary">
                        Analyze
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'week')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th>Date</th>
                            <td>{{ $data['date'] }}</td>
                        </tr>

                        <tr>
                            <th>Week Number</th>
                            <td>{{ $data['week_number'] }}</td>
                        </tr>

                        <tr>
                            <th>Week Start</th>
                            <td>{{ $data['week_start'] }}</td>
                        </tr>

                        <tr>
                            <th>Week End</th>
                            <td>{{ $data['week_end'] }}</td>
                        </tr>

                        <tr>
                            <th>Quarter</th>
                            <td>{{ $data['quarter_name'] }}</td>
                        </tr>

                        <tr>
                            <th>Quarter Start</th>
                            <td>{{ $data['quarter_start'] }}</td>
                        </tr>

                        <tr>
                            <th>Quarter End</th>
                            <td>{{ $data['quarter_end'] }}</td>
                        </tr>

                        <tr>
                            <th>Year</th>
                            <td>{{ $data['year'] }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 11. WEEKEND -->
    <!-- ===================================================== -->

    @if ($activeTool === 'weekend')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    🌞 Weekend / Weekday Checker
                </h3>

                <form
                    method="POST"
                    action="{{ route('weekend.check') }}"
                >

                    @csrf

                    <input
                        type="date"
                        name="date"
                        class="form-control mb-3"
                        value="{{ old('date') }}"
                        required
                    >

                    <button class="btn btn-primary">
                        Check Date
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'weekend')

            <div class="card result-card mt-4">

                <div class="card-body text-center">

                    <h4>
                        {{ $data['date'] }}
                    </h4>

                    <h2 class="mt-3">

                        @if ($data['is_weekend'])

                            🏖️ Weekend

                        @else

                            💼 Weekday

                        @endif

                    </h2>

                    <p class="text-muted">
                        {{ $data['day'] }}
                    </p>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 12. TIMESTAMP -->
    <!-- ===================================================== -->

    @if ($activeTool === 'timestamp')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    ⏱️ Unix Timestamp Converter
                </h3>

                <p class="text-muted">
                    Convert a Unix timestamp into a readable date.
                </p>

                <form
                    method="POST"
                    action="{{ route('timestamp.convert') }}"
                >

                    @csrf

                    <input
                        type="number"
                        name="timestamp"
                        class="form-control mb-3"
                        placeholder="1726272000"
                        value="{{ old('timestamp') }}"
                        required
                    >

                    <button class="btn btn-primary">
                        Convert Timestamp
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'timestamp')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th>Timestamp</th>
                            <td>{{ $data['timestamp'] }}</td>
                        </tr>

                        <tr>
                            <th>Unit</th>
                            <td>{{ $data['unit'] }}</td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td>{{ $data['date'] }}</td>
                        </tr>

                        <tr>
                            <th>Time</th>
                            <td>{{ $data['time'] }}</td>
                        </tr>

                        <tr>
                            <th>Full Date</th>
                            <td>{{ $data['full'] }}</td>
                        </tr>

                        <tr>
                            <th>Timezone</th>
                            <td>{{ $data['timezone'] }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        @endif

    @endif


    <!-- ===================================================== -->
    <!-- 13. DATE RANGE -->
    <!-- ===================================================== -->

    @if ($activeTool === 'range')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3>
                    📋 Date Range Generator
                </h3>

                <p class="text-muted">
                    Generate every date between two dates.
                </p>

                <form
                    method="POST"
                    action="{{ route('date.range') }}"
                >

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Start Date
                            </label>

                            <input
                                type="date"
                                name="start_date"
                                class="form-control"
                                value="{{ old('start_date') }}"
                                required
                            >

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                End Date
                            </label>

                            <input
                                type="date"
                                name="end_date"
                                class="form-control"
                                value="{{ old('end_date') }}"
                                required
                            >

                        </div>

                    </div>

                    <button class="btn btn-primary">
                        Generate Dates
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'range')

            <div class="card result-card mt-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="mb-0">
                            Generated Dates
                        </h4>

                        <span class="badge bg-primary">
                            {{ $data['total'] }} dates
                        </span>

                    </div>


                    <div class="table-responsive date-list">

                        <table class="table table-bordered">

                            <thead class="table-dark">

                                <tr>

                                    <th>
                                        #
                                    </th>

                                    <th>
                                        Date
                                    </th>

                                    <th>
                                        Day
                                    </th>

                                    <th>
                                        Type
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($data['dates'] as $index => $item)

                                    <tr>

                                        <td>
                                            {{ $index + 1 }}
                                        </td>

                                        <td>
                                            {{ $item['date'] }}
                                        </td>

                                        <td>
                                            {{ $item['day'] }}
                                        </td>

                                        <td>

                                            @if ($item['weekend'])

                                                <span class="badge bg-warning text-dark">
                                                    Weekend
                                                </span>

                                            @else

                                                <span class="badge bg-success">
                                                    Weekday
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        @endif

    @endif


</div>


<footer class="footer text-center">

    <div class="container">

        <p class="mb-0">
            Laravel 12 Date Format & Carbon Demonstration
        </p>

        <small>
            13 Date & Time Utilities
        </small>

    </div>

</footer>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>