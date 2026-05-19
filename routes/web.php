<?php
use App\Http\Controllers\UseraccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllTaskController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return view('layout.app');
});
Route::resource('tasks', AllTaskController::class);
Route::patch('/tasks/{task}/toggle', [AllTaskController::class, 'toggle']);
