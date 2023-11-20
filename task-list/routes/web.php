<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('task.index');

Route::get('/hello', function () {
    return 'Hello Page';
});

Route::get('/greet/{name}', function ($name) {
    return 'Hello' . $name . '!';
});

Route::get('/hallo', function () {
    return redirect()->route('task.index');
});

Route::fallback(function () {
    return 'Still got somewhere';
});
