<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laravel 12 Date & Time Tools</title>

    <!-- Bootstrap 5 -->
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

        .tool-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .result-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .result-value {
            font-size: 1.15rem;
            font-weight: 600;
        }

        .feature-card {
            transition: 0.2s;
            border-radius: 12px;
        }

        .feature-card:hover {
            transform: translateY(-3px);
        }

        .footer {
            margin-top: 75px;
            padding: 25px 0;
            background: #212529;
            color: white;
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

    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold">
            Date & Time Utilities
        </h1>

        <p class="text-muted">
            Laravel 12 Carbon Date Formatting and Conversion
        </p>
    </div>


    <!-- Tool Navigation -->
    <div class="row g-3 mb-5">

        <div class="col-md-4">
            <a
                href="{{ url('/date-difference') }}"
                class="text-decoration-none"
            >
                <div
                    class="card feature-card h-100
                    {{ $activeTool === 'difference' ? 'border-primary' : '' }}"
                >
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            📅 Date Difference
                        </h5>

                        <p class="text-muted mb-0">
                            Calculate the difference between two dates.
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a
                href="{{ url('/human-readable-date') }}"
                class="text-decoration-none"
            >
                <div
                    class="card feature-card h-100
                    {{ $activeTool === 'human' ? 'border-primary' : '' }}"
                >
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            🕐 Human Readable Date
                        </h5>

                        <p class="text-muted mb-0">
                            Convert dates into readable formats.
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a
                href="{{ url('/timezone-converter') }}"
                class="text-decoration-none"
            >
                <div
                    class="card feature-card h-100
                    {{ $activeTool === 'timezone' ? 'border-primary' : '' }}"
                >
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            🌍 Timezone Converter
                        </h5>

                        <p class="text-muted mb-0">
                            Convert date and time between timezones.
                        </p>
                    </div>
                </div>
            </a>
        </div>

    </div>


    <!-- Validation Errors -->

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


    <!-- DATE DIFFERENCE -->

    @if ($activeTool === 'difference')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3 class="mb-3">
                    📅 Date Difference Calculator
                </h3>

                <p class="text-muted">
                    Calculate the difference between two dates using
                    Laravel Carbon.
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

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Calculate Difference
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'difference')

            <div class="card result-card mt-4">

                <div class="card-body p-4">

                    <h4 class="mb-4">
                        Calculation Result
                    </h4>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <small class="text-muted">
                                    Start Date
                                </small>

                                <div class="result-value">
                                    {{ $data['start_date'] }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <small class="text-muted">
                                    End Date
                                </small>

                                <div class="result-value">
                                    {{ $data['end_date'] }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <small class="text-muted">
                                    Total Days
                                </small>

                                <div class="result-value">
                                    {{ $data['total_days'] }} days
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <small class="text-muted">
                                    Total Months
                                </small>

                                <div class="result-value">
                                    {{ $data['total_months'] }} months
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <small class="text-muted">
                                    Total Years
                                </small>

                                <div class="result-value">
                                    {{ $data['total_years'] }} years
                                </div>
                            </div>
                        </div>

                        <div class="col-12">

                            <div class="alert alert-success mb-0">

                                <strong>
                                    Detailed Difference:
                                </strong>

                                {{ $data['years'] }} years,
                                {{ $data['months'] }} months,
                                {{ $data['days'] }} days

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endif

    @endif


    <!-- HUMAN READABLE -->

    @if ($activeTool === 'human')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3 class="mb-3">
                    🕐 Human-Readable Date Converter
                </h3>

                <p class="text-muted">
                    Convert a date into multiple human-readable formats
                    using Carbon.
                </p>

                <form
                    method="POST"
                    action="{{ route('human.readable') }}"
                >

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Select Date & Time
                        </label>

                        <input
                            type="datetime-local"
                            name="date_time"
                            class="form-control"
                            value="{{ old('date_time') }}"
                            required
                        >

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Convert Date
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'human')

            <div class="card result-card mt-4">

                <div class="card-body p-4">

                    <h4 class="mb-4">
                        Converted Date Formats
                    </h4>

                    <div class="table-responsive">

                        <table class="table table-bordered align-middle">

                            <tbody>

                                <tr>
                                    <th width="35%">
                                        Original Date
                                    </th>

                                    <td>
                                        {{ $data['original'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Full Date
                                    </th>

                                    <td>
                                        {{ $data['full_date'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Short Date
                                    </th>

                                    <td>
                                        {{ $data['short_date'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        US Date Format
                                    </th>

                                    <td>
                                        {{ $data['us_date'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Long Date
                                    </th>

                                    <td>
                                        {{ $data['long_date'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Day & Date
                                    </th>

                                    <td>
                                        {{ $data['day_date'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Time
                                    </th>

                                    <td>
                                        {{ $data['time'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Relative Time
                                    </th>

                                    <td>
                                        {{ $data['relative'] }}
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        @endif

    @endif


    <!-- TIMEZONE CONVERTER -->

    @if ($activeTool === 'timezone')

        <div class="card tool-card">

            <div class="card-body p-4">

                <h3 class="mb-3">
                    🌍 Timezone Date Converter
                </h3>

                <p class="text-muted">
                    Convert a date and time from one timezone to another
                    using Carbon.
                </p>

                <form
                    method="POST"
                    action="{{ route('timezone.convert') }}"
                >

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Date & Time
                        </label>

                        <input
                            type="datetime-local"
                            name="date_time"
                            class="form-control"
                            value="{{ old('date_time') }}"
                            required
                        >

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                From Timezone
                            </label>

                            <select
                                name="from_timezone"
                                class="form-select"
                                required
                            >

                                <option value="Asia/Kolkata">
                                    Asia/Kolkata (India)
                                </option>

                                <option value="UTC">
                                    UTC
                                </option>

                                <option value="America/New_York">
                                    America/New_York
                                </option>

                                <option value="America/Los_Angeles">
                                    America/Los_Angeles
                                </option>

                                <option value="Europe/London">
                                    Europe/London
                                </option>

                                <option value="Europe/Paris">
                                    Europe/Paris
                                </option>

                                <option value="Asia/Dubai">
                                    Asia/Dubai
                                </option>

                                <option value="Asia/Singapore">
                                    Asia/Singapore
                                </option>

                                <option value="Asia/Tokyo">
                                    Asia/Tokyo
                                </option>

                                <option value="Australia/Sydney">
                                    Australia/Sydney
                                </option>

                            </select>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                To Timezone
                            </label>

                            <select
                                name="to_timezone"
                                class="form-select"
                                required
                            >

                                <option value="America/New_York">
                                    America/New_York
                                </option>

                                <option value="Asia/Kolkata">
                                    Asia/Kolkata (India)
                                </option>

                                <option value="UTC">
                                    UTC
                                </option>

                                <option value="America/Los_Angeles">
                                    America/Los_Angeles
                                </option>

                                <option value="Europe/London">
                                    Europe/London
                                </option>

                                <option value="Europe/Paris">
                                    Europe/Paris
                                </option>

                                <option value="Asia/Dubai">
                                    Asia/Dubai
                                </option>

                                <option value="Asia/Singapore">
                                    Asia/Singapore
                                </option>

                                <option value="Asia/Tokyo">
                                    Asia/Tokyo
                                </option>

                                <option value="Australia/Sydney">
                                    Australia/Sydney
                                </option>

                            </select>

                        </div>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Convert Timezone
                    </button>

                </form>

            </div>

        </div>


        @if ($result === 'timezone')

            <div class="card result-card mt-4">

                <div class="card-body p-4">

                    <h4 class="mb-4">
                        Timezone Conversion Result
                    </h4>

                    <div class="row g-4">

                        <div class="col-md-6">

                            <div class="border rounded p-4 h-100">

                                <h5>
                                    Original Date & Time
                                </h5>

                                <hr>

                                <p class="mb-2">
                                    <strong>
                                        Date:
                                    </strong>

                                    {{ $data['original'] }}
                                </p>

                                <p class="mb-2">
                                    <strong>
                                        Timezone:
                                    </strong>

                                    {{ $data['original_timezone'] }}
                                </p>

                                <p class="mb-0">
                                    <strong>
                                        UTC Offset:
                                    </strong>

                                    {{ $data['original_offset'] }}
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="border rounded p-4 h-100">

                                <h5>
                                    Converted Date & Time
                                </h5>

                                <hr>

                                <p class="mb-2">
                                    <strong>
                                        Date:
                                    </strong>

                                    {{ $data['converted'] }}
                                </p>

                                <p class="mb-2">
                                    <strong>
                                        Timezone:
                                    </strong>

                                    {{ $data['converted_timezone'] }}
                                </p>

                                <p class="mb-0">
                                    <strong>
                                        UTC Offset:
                                    </strong>

                                    {{ $data['converted_offset'] }}
                                </p>

                            </div>

                        </div>

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

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>