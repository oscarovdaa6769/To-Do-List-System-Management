<?php

use App\Http\Controllers\AllTaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/all-tasks', [AllTaskController::class, 'index']);
Route::post('/all-tasks', [AllTaskController::class, 'store']);
