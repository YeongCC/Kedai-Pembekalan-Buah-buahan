<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\ShowFruitController;



Route::get('/',[ShowFruitController::class,'show'])->name('index');


Auth::routes();
Route::get('/logout', [LoginController::class,'logout']);
Route::get('/insertProduct',[FruitController::class,'interface'])->name('insertProduct');
Route::post('/insertProduct/store',[FruitController::class,'store'])->name('insertProduct.store');

Route::get('/viewProduct',[FruitController::class,'show'])->name('viewProduct');
Route::get('getMoreFruits', [FruitController::class,'getMoreFruits'])->name('get-more-fruits');

Route::get('/editProduct/{id}',[FruitController::class,'edit'])->name('showEditProduct');
Route::post('/updateProduct',[FruitController::class,'update'])->name('updateProduct.store');
Route::get('/deleteProduct/{id}',[FruitController::class,'delete'])->name('deleteProduct.store');
Route::get('/hideProduct/{id}/{status}',[FruitController::class,'hide'])->name('hideProduct.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
