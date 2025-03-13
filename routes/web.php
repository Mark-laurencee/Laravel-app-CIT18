<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\TasksController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return "Hello, Laravel!";
});


Route::resource('tasks', TasksController::class);

