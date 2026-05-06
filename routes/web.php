<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/all-tasks', function () {
    return view('all_tasks.index');
});
