<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AllTaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UseraccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
Route::get('/', function () {
    return view('layouts.app');
});
Route::resource('tasks', AllTaskController::class);
Route::patch('/tasks/{task}/toggle', [AllTaskController::class, 'toggle']);

Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp'])->name('signup.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'logIn'])->name('login.post');

Route::post('/logout', function () {
    return redirect()->route('login');
})->name('logout');

Route::get('/account',[AccountController::class, 'index'])->name('acc')->middleware('auth');

Route::get('/', function () {
    return redirect()->route('signup');
});

Route::resource('calendars', CalendarController::class);
