<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/logout', [LoginController::class,'logout']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
