<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'Dashboard'])->name('admin.dashboard');
Route::get('/login', [DashboardController::class, 'LoginPage'])->name('loginPage');
