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

use App\Http\Requests\Api\Patient\Patients\RecentVisitsRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(["prefix" => "admin", "namespace" => "Admin"], function () {
    /********************Category Route*******************/

Route::resource('/category','CategoryController');
Route::POST('/category/store','CategoryController@store')->name('category.store');
Route::POST('/category/{id}/update','CategoryController@update')->name('category.update');
Route::POST('/category/{id}/destroy','CategoryController@destroy')->name('category.destroy');

    /***********************Tag Route********************/

Route::resource('/subcategory', 'SubCategoryController');   
Route::POST('/subcategory/store','SubCategoryController@store')->name('subcategory.store'); 
Route::POST('/subcategory/{id}/update','SubCategoryController@update')->name('subcategory.update');
Route::POST('/subcategory/{id}/destroy','SubCategoryController@destroy')->name('subcategory.destroy');
});