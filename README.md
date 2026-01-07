# PHP_Laravel12_Change_Date_Formate

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Carbon-Date%20Handling-00C853?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Beginner-Friendly-Yes-4CAF50?style=for-the-badge" />
</p>

## Overview

This project demonstrates how to **change and convert date formats in Laravel 12** using **Carbon** and **Eloquent models**.
It is written in a simple, step-by-step manner and is ideal for beginners who want to understand date handling in Laravel.

The project includes:

* Laravel 12 installation steps
* Database configuration
* Sample user data insertion
* Multiple date format conversion examples
* Full controller and route code

---

## Features

* Laravel 12 compatible
* Uses Carbon for date and time handling
* Covers common date format conversions
* Beginner-friendly examples
* Copy-paste ready code
* Suitable for learning and interviews

---

## Folder Structure

```
laravel12/
├── app/
│   └── Http/
│       └── Controllers/
│           └── DemoController.php
├── routes/
│   └── web.php
├── database/
│   └── migrations/
├── .env
└── README.md
```

---

---

## Step 1: Install Laravel 12

Create a new Laravel project:

```bash
composer create-project laravel/laravel laravel12
```

Run the development server:

```bash
php artisan serve
```

Open in browser:

```
http://127.0.0.1:8000
```

---

## Step 2: Database Configuration

Update the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations:

```bash
php artisan migrate
```

---

## Step 3: Insert Sample User Data

Run Tinker:

```bash
php artisan tinker
```

```php
\App\Models\User::create([
    'name' => 'Demo User',
    'email' => 'demo@gmail.com',
    'password' => bcrypt('123456')
]);
```

---

## Step 4: Controller

### 4.1 Create Controller

```bash
php artisan make:controller DemoController
```

---

## Example 1: Change Date Format Using Model (created_at)

### Controller

`app/Http/Controllers/DemoController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\User;

class DemoController extends Controller
{
    // Change date format using Eloquent model created_at
    public function index()
    {
        $user = User::first();
        $newDate = $user->created_at->format('d-m-Y');
        dd($newDate);
    }
}
```

### Route

```php
Route::get('/date1', [DemoController::class, 'index']);
```

**Output**

```
06-01-2026
```
<img width="432" height="108" alt="Screenshot 2026-01-07 130810" src="https://github.com/user-attachments/assets/a7a69399-ca2d-413d-a35c-49db01fe898d" />

---

## Example 2: Convert Y-m-d H:i:s to m/d/Y

### Controller

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

class DemoController extends Controller
{
    // Convert Y-m-d H:i:s to m/d/Y format
    public function index()
    {
        $date = date('Y-m-d H:i:s');
        $newDate = Carbon::createFromFormat('Y-m-d H:i:s', $date)
                        ->format('m/d/Y');
        dd($newDate);
    }
}
```

### Route

```php
Route::get('/example2', [DemoController::class, 'index']);
```

**Output**

```
01/07/2026
```
<img width="469" height="113" alt="Screenshot 2026-01-07 130957" src="https://github.com/user-attachments/assets/4eefa9b2-54c0-4f57-b206-4cfa9af89fa7" />

---

## Example 3: Convert Y-m-d to m/d/Y

### Controller

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

class DemoController extends Controller
{
    // Convert Y-m-d to m/d/Y format
    public function index()
    {
        $date = "2024-03-24";
        $newDate = Carbon::createFromFormat('Y-m-d', $date)
                        ->format('m/d/Y');
        dd($newDate);
    }
}
```

### Route

```php
Route::get('/example3', [DemoController::class, 'index']);
```

**Output**

```
03/24/2024
```
<img width="467" height="115" alt="Screenshot 2026-01-07 131039" src="https://github.com/user-attachments/assets/51b3148e-6b72-463d-be32-7b29484f981f" />

---

## Example 4: Convert m/d/Y to Y-m-d

### Controller

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

class DemoController extends Controller
{
    // Convert m/d/Y to Y-m-d format
    public function index()
    {
        $date = "03/24/2024";
        $newDate = Carbon::createFromFormat('m/d/Y', $date)
                        ->format('Y-m-d');
        dd($newDate);
    }
}
```

### Route

```php
Route::get('/example4', [DemoController::class, 'index']);
```

**Output**

```
2024-03-24
```
<img width="460" height="127" alt="Screenshot 2026-01-07 131056" src="https://github.com/user-attachments/assets/1c49ba66-53c0-433c-a7b3-fee2c057ac53" />

---

## Example 5: Convert Y-m-d to d/m/Y

### Controller

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

class DemoController extends Controller
{
    // Convert Y-m-d to d/m/Y format
    public function index()
    {
        $date = "2024-03-24";
        $newDate = Carbon::createFromFormat('Y-m-d', $date)
                        ->format('d/m/Y');
        dd($newDate);
    }
}
```

### Route

```php
Route::get('/example5', [DemoController::class, 'index']);
```

**Output**

```
24/03/2024
```
<img width="499" height="124" alt="Screenshot 2026-01-07 131115" src="https://github.com/user-attachments/assets/fb7ef7de-5905-413a-a149-cd8f5a7bde95" />

---

## Full Controller Code (All Examples)

```php
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

        if ($path === 'date1') {
            $user = User::first();
            dd($user->created_at->format('d-m-Y'));
        }

        if ($path === 'example2') {
            $date = date('Y-m-d H:i:s');
            dd(Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/Y'));
        }

        if ($path === 'example3') {
            dd(Carbon::createFromFormat('Y-m-d', '2024-03-24')->format('m/d/Y'));
        }

        if ($path === 'example4') {
            dd(Carbon::createFromFormat('m/d/Y', '03/24/2024')->format('Y-m-d'));
        }

        if ($path === 'example5') {
            dd(Carbon::createFromFormat('Y-m-d', '2024-03-24')->format('d/m/Y'));
        }

        abort(404);
    }
}
```

---

## Full Routes

`routes/web.php`

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

Route::get('/date1', [DemoController::class, 'index']);
Route::get('/example2', [DemoController::class, 'index']);
Route::get('/example3', [DemoController::class, 'index']);
Route::get('/example4', [DemoController::class, 'index']);
Route::get('/example5', [DemoController::class, 'index']);
```
