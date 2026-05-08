<?php
use App\Http\Controllers\UseraccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});



Route::get('/login',[LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

Route::get('/user',[UseraccountController::class, 'index']);