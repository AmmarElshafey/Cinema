<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Authentication

    Route::get('/signup', function () {
        return view('auth.signup');
    })->name('signup');

    Route::post('/signup', [
        AdminAuthController::class,
        'signup',
    ])->name('signup.submit');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [
        AdminAuthController::class,
        'login',
    ])->name('login.submit');


    // Protected Admin Area

    Route::get('/dashboard', [
        AdminDashboardController::class,
        'index',
    ])
        ->middleware('auth')
        ->name('dashboard');

    Route::post('/logout', [
        AdminAuthController::class,
        'logout',
    ])
        ->middleware('auth')
        ->name('logout');


    // Movies CRUD

    Route::resource('/movies', MovieController::class)
        ->middleware('auth');
});

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/movies/{movie}', [HomeController::class, 'show'])
    ->name('movies.show');