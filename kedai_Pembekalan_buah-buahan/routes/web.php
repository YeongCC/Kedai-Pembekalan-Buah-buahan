<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

Auth::routes();
Route::get('/logout', [LoginController::class,'logout']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
