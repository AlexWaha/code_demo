<?php

    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\ProjectController;
    use App\Http\Controllers\StatusController;
    use App\Http\Controllers\TaskController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |*/


    Route::get('auth', [LoginController::class, 'index'])->name('auth');
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::resource('projects', ProjectController::class);
        Route::resource('tasks', TaskController::class);
        Route::resource('statuses', StatusController::class);
        Route::resource('users', UserController::class);
    });
