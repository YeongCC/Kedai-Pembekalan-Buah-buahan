<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowProductController;
use App\Http\Controllers\UserController;


Route::get('/',[ShowProductController::class,'showProduct'])->name('index');
Route::get('getMoreProductCus',[ShowProductController::class,'getMoreProducts'])->name('get-more-products-cus');
Route::get('getProductDetails/{id}', [ShowProductController::class,'product_details'])->name('get-more-products-detail-cus');
Route::get('/checkReceipt', function () {return view('customer/Receipt/checkReceipt');});
Route::get('getProductDetails2/{id}', [ShowProductController::class,'view_product_details'])->name('get-more-products-detail-cus2');


Auth::routes();
Route::get('/logout', [LoginController::class,'logout']);
Route::get('/insertProduct',[ProductController::class,'Productinterface'])->name('insertProduct');
Route::post('/insertProduct/store',[ProductController::class,'store'])->name('insertProduct.store');
Route::get('/viewProduct',[ProductController::class,'viewProduct'])->name('viewProduct');
Route::get('getMoreProduct', [ProductController::class,'getMoreProducts'])->name('get-more-products');
Route::get('/editProduct/{id}',[ProductController::class,'edit'])->name('showEditProduct');
Route::post('/updateProduct',[ProductController::class,'update'])->name('updateProduct.store');
Route::get('/deleteProduct/{id}',[ProductController::class,'delete'])->name('deleteProduct.store');
Route::get('/hideProduct/{id}/{status}',[ProductController::class,'hide'])->name('hideProduct.store');

Route::get('/createUser',[UserController::class,'Authinterface'])->name('createUser');
Route::post('/createUser/create',[UserController::class,'createUser'])->name('createUser.create');
Route::get('/showUser',[UserController::class,'showUser'])->name('showUser');
Route::get('getMoreUsers', [UserController::class,'getMoreUsers'])->name('get-more-users');
Route::get('/editUser/{id}',[UserController::class,'editUser'])->name('showEditUser');
Route::post('/updateUser',[UserController::class,'updateUser'])->name('updateProduct.create');
Route::get('/deleteUser/{id}',[UserController::class,'deleteUser'])->name('deleteUser.create');

Route::get('/editOwn/{position}',[UserController::class,'editOwn'])->name('showown.update');
Route::post('/updateOwn',[UserController::class,'updateOwn'])->name('own.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
