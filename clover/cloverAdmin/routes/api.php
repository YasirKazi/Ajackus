<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Get Category List
Route::get('/category', 'categoryDataController@index');

//Get Product List
Route::get('/getProduct/{id}', 'productDataController@show');

//Register User
Route::post('/user/register', 'userDataController@store');

//Login User
Route::post('/user/login', 'userDataController@show');

//confirm Order
Route::post('/order/confirm', 'purchaseOrderController@store');