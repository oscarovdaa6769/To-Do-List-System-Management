<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AllTaskController;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('tasks', AllTaskController::class);
Route::patch('/tasks/{task}/toggle', [AllTaskController::class, 'toggle']);

Route::resource('calendars', CalendarController::class);
