<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'Dashboard'])->name('admin.dashboard');

Route::get('/login', [DashboardController::class, 'LoginPage'])->name('login.page');
Route::post('/login/make', [DashboardController::class, 'LoginMake'])->name('login.make');
Route::get('/logout', [DashboardController::class, 'Logout'])->name('logout');

Route::get('/signin', [DashboardController::class, 'RegisterPage'])->name('register.page');
Route::post('/signin/make', [DashboardController::class, 'RegisterMake'])->name('register.make')->middleware('AuthUser');
