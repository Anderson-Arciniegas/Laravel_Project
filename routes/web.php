<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


/**
 * Routes that require authentication and admin role.
 */
Route::middleware(['auth', \App\Http\Middleware\CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin', [AuthController::class, 'showAdmin'])->name('admin');
});

/**
 * Routes that require authentication.
 */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard', ['user' => auth()->user()]);
    })->name('dashboard');
});

/**
 * Routes that are accessible to guests (non-authenticated users).
 */
Route::middleware('guest')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::get('/register', function () {
        return view('auth.register');
    });
});

/**
 * Route to get the authenticated user.
 */
Route::get('/user', [AuthController::class, 'getUser'])->name('user');

/**
 * Route to get all users.
 */
Route::get('/users', [AuthController::class, 'getUsers'])->name('users');

/**
 * Route to register a new user.
 */
Route::post('/register', [AuthController::class, 'register'])->name('register');

/**
 * Route to log in a user.
 */
Route::post('/login', [AuthController::class, 'login'])->name('login');

/**
 * Route to log out a user.
 */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/**
 * Route to delete a user.
 */
Route::delete('/user/{user}',  [AuthController::class, 'deleteUser'])->name('user.delete');

/**
 * Route to update a user's role.
 */
Route::patch('/user/{user}/role', [AuthController::class, 'updateRole'])->name('user.updateRole');
