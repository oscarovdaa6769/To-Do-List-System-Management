<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllTaskController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return view('layout.app');
});

Route::get('/all-tasks', [AllTaskController::class, 'index']);
Route::post('/all-tasks', [AllTaskController::class, 'store']);
