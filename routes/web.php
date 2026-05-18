<?php

use App\Http\Controllers\AllTaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('tasks', AllTaskController::class);
Route::patch('/tasks/{task}/toggle', [AllTaskController::class, 'toggle']);
