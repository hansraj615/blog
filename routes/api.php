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

Route::group(["prefix" => "admin", "namespace" => "Admin"], function () {
  
    Route::get('/category/getall','CategoryController@getAll');
    Route::get('/category/create','CategoryController@create')->name('category.create');
    Route::POST('/category/store','CategoryController@store')->name('category.store');
    Route::resource('/category','CategoryController');
    
    });