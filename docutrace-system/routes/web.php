<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
