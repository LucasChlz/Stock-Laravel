<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'Dashboard'])->name('admin.dashboard');

Route::prefix('create')->group(function () {
    Route::get('/', [DashboardController::class, 'CreatePage'])->name('admin.create');
    Route::post('/make', [DashboardController::class, 'CreateMake'])->name('admin.create.make')->middleware('ProductAuth'); 
});

Route::prefix('product')->group(function () {
    Route::get('/product/update/{id}', [DashboardController::class, 'updateProduct'])->name('admin.product.update');
    Route::put('/product/update/{id}/make', [DashboardController::class, 'updateProductMake'])->name('admin.product.update.make');
});


Route::patch('/update', [DashboardController::class, 'updateAmount'])->name('admin.amount.update');
Route::delete('/delete', [DashboardController::class, 'deleteProduct'])->name('admin.delete');
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::prefix('login')->group(function () {    
    Route::get('/', [AuthController::class, 'LoginPage'])->name('login.page');
    Route::post('/make', [AuthController::class, 'LoginMake'])->name('login.make');
});


Route::prefix('signin')->group(function () {
    Route::get('/', [AuthController::class, 'RegisterPage'])->name('register.page');
    Route::post('/make', [AuthController::class, 'RegisterMake'])->name('register.make')->middleware('AuthUser');
});
