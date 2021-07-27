<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowProductController;
use App\Http\Controllers\CartOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShowOrderController;

// Route::get('/', [ShowProductController::class, 'showProduct'])->name('index');
Route::get('/', function () {return view('index');});
Route::get('getMoreProductCus', [ShowProductController::class, 'getMoreProducts'])->name('get-more-products-cus');
Route::get('getProductDetails/{id}', [ShowProductController::class, 'product_details'])->name('get-more-products-detail-cus');

Route::get('getProductDetails2/{id}', [ShowProductController::class, 'view_product_details'])->name('get-more-products-detail-cus2');
Route::get('/cart', [CartOrderController::class, 'cart'])->name('cart');
Route::post('/addToCart', [CartOrderController::class, 'addToCart'])->name('addToCart.order');
Route::get('addToCartModel/{id}', [CartOrderController::class, 'addToCartModal'])->name('addToCartModel');
Route::patch('updateFromCart', [CartOrderController::class, 'updateCart'])->name('updateCart');
Route::delete('removeFromCart', [CartOrderController::class, 'removeCart'])->name('removeCart');
Route::get('clearAllCart', [CartOrderController::class, 'clearCart'])->name('clearCart');
Route::get('/confirmCart', [CartOrderController::class, 'confirmCart'])->name('confirmCart');
Route::post('/addOrderDetailList', [CartOrderController::class, 'addOrderDetailList'])->name('addOrderDetailList.order');
Route::get('/corfirmDetail', function () {return view('customer/confirmOrder');})->name('corfirmDetail');
Route::post('/corfirmDetail/confirm', [CartOrderController::class, 'confirmDetail'])->name('confirmDetail.confirm');
Route::get('/getReceipt', function () {return view('customer/Receipt/getReceipt');})->name('getReceipt');
Route::get('/leaveRecaipt', [CartOrderController::class, 'leaveRecaipt'])->name('leaveRecaipt');

Route::get('/downloadRecaipt', [CartOrderController::class, 'downloadReceipt'])->name('downloadReceipt');



Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/insertProduct', [ProductController::class, 'Productinterface'])->name('insertProduct');
Route::post('/insertProduct/store', [ProductController::class, 'store'])->name('insertProduct.store');
Route::get('/viewProduct', [ProductController::class, 'viewProduct'])->name('viewProduct');
Route::get('getMoreProduct', [ProductController::class, 'getMoreProducts'])->name('get-more-products');
Route::get('/editProduct/{id}', [ProductController::class, 'edit'])->name('showEditProduct');
Route::post('/updateProduct', [ProductController::class, 'update'])->name('updateProduct.store');
Route::get('/deleteProduct/{id}', [ProductController::class, 'delete'])->name('deleteProduct.store');
Route::get('/hideProduct/{id}/{status}', [ProductController::class, 'hide'])->name('hideProduct.store');
Route::get('/createUser', [UserController::class, 'Authinterface'])->name('createUser');
Route::post('/createUser/create', [UserController::class, 'createUser'])->name('createUser.create');
Route::get('/showUser', [UserController::class, 'showUser'])->name('showUser');
Route::get('getMoreUsers', [UserController::class, 'getMoreUsers'])->name('get-more-users');
Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('showEditUser');
Route::post('/updateUser', [UserController::class, 'updateUser'])->name('updateProduct.create');
Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser.create');
Route::get('/editOwn/{position}', [UserController::class, 'editOwn'])->name('showown.update');
Route::post('/updateOwn', [UserController::class, 'updateOwn'])->name('own.update');

Route::get('/viewOrder', [ShowOrderController::class, 'viewOrder'])->name('viewOrder');
Route::get('getMoreOrders', [ShowOrderController::class, 'getMoreOrders'])->name('get-more-orders');
Route::get('/checkReceiptDetail/{Customer_order_id}', [ShowOrderController::class, 'checkOrderDetails'])->name('checkOrderDetails');
Route::get('/doneOrder/{Customer_order_id}/{Customer_Status}', [ShowOrderController::class, 'setOrderStatus'])->name('doneOrder.check');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
