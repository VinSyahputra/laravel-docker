<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'login', 'middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/', [LoginController::class, 'login']);
});
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/users', function () {
        return view('admin.blank', ['title' => 'Users Management']);
    })->name('users');

    Route::get('/settings', function () {
        return view('admin.blank', ['title' => 'Admin Settings']);
    })->name('settings');

    Route::get('/profile', function () {
        return view('admin.blank', ['title' => 'My Profile']);
    })->name('profile');
});
