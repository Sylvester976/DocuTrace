<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::post('/register', [RegisterController::class, 'auth_register'])->name('register.submit');
