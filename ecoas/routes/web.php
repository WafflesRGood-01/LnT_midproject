<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/dashboard/action', [DashboardController::class, 'handle'])->name('dashboard.action');

Route::get('/', function () {
    return view('admin.login');
});

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');