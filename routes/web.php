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
use App\Http\Controllers\SettingsController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::resource('tasks', AllTaskController::class);
Route::patch('/tasks/{task}/toggle', [AllTaskController::class, 'toggle']);

Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp'])->name('signup.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'logIn'])->name('login.post');

Route::post('/logout', function () {
    return redirect()->route('login');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::patch('/account/profile', [AccountController::class, 'updateProfile'])->name('account.profile.update');
});

Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('user-password.update');

Route::get('/', function () {
    return redirect()->route('signup');
});

Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

Route::patch('/settings/preferences', [SettingsController::class, 'updatePreferences'])->name('settings.preferences.update');
Route::patch('/settings/notifications', [SettingsController::class, 'updateNotifications'])->name('settings.notifications.update');
