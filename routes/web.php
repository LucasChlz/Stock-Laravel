<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'Dashboard'])->name('admin.dashboard');
Route::get('/create', [DashboardController::class, 'CreatePage'])->name('admin.create');
Route::post('/create/make', [DashboardController::class, 'CreateMake'])->name('admin.create.make')->middleware('ProductAuth');

Route::patch('/update', [DashboardController::class, 'updateAmount'])->name('admin.amount.update');
Route::delete('/delete', [DashboardController::class, 'deleteProduct'])->name('admin.delete');

Route::get('/login', [AuthController::class, 'LoginPage'])->name('login.page');
Route::post('/login/make', [AuthController::class, 'LoginMake'])->name('login.make');
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::get('/signin', [AuthController::class, 'RegisterPage'])->name('register.page');
Route::post('/signin/make', [AuthController::class, 'RegisterMake'])->name('register.make')->middleware('AuthUser');
