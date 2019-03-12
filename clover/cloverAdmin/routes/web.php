<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Category CRUD controller
Route::resource('category', 'productCategoryController');

//Product CRUD controller
Route::resource('product', 'productController');

//Purchase Order CRUD controller
Route::resource('orders', 'purchaseOrderController');

Route::get('/', function () {
    return view('home');
});