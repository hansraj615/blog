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

Route::get('/', 'HomeController@index')->name('index');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(["prefix" => "admin", "namespace" => "Admin"], function () {
    /********************Category Route*******************/
// Route::get('/index','IndexController@index')->name('admin.index');
Route::resource('/category','CategoryController');
Route::POST('/category/store','CategoryController@store')->name('category.store');
Route::POST('/category/{id}/update','CategoryController@update')->name('category.update');
Route::POST('/category/{id}/destroy','CategoryController@destroy')->name('category.destroy');

    /***********************SubCategory Route********************/

Route::resource('/subcategory', 'SubCategoryController');   
Route::POST('/subcategory/store','SubCategoryController@store')->name('subcategory.store'); 
Route::POST('/subcategory/{id}/update','SubCategoryController@update')->name('subcategory.update');
Route::POST('/subcategory/{id}/destroy','SubCategoryController@destroy')->name('subcategory.destroy');

/****************************Album******************************/


Route::get('/album/getsubcategory','AlbumController@getSubCategory');
Route::resource('/album', 'AlbumController'); 
Route::POST('/album/store','AlbumController@store')->name('album.store'); 
Route::POST('/album/{id}/update','AlbumController@update')->name('album.update');
Route::POST('/album/{id}/destroy','AlbumController@destroy')->name('album.destroy');

/***********************Gallery**********************************/

Route::get('/gallery/getcategory','GalleryController@getCategory');
Route::get('/gallery/getsubcategory','GalleryController@getSubCategory');
Route::resource('/gallery','GalleryController');
Route::POST('/gallery/store','GalleryController@store')->name('gallery.store'); 
Route::POST('/gallery/{id}/update','GalleryController@update')->name('gallery.update');
Route::POST('/gallery/{id}/destroy','GalleryController@destroy')->name('gallery.destroy');


/***************************Admin/Profile****************************/

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::POST('/profile/update', 'ProfileController@update')->name('profile.update');



/******************************Role**************************/
Route::resource('/role','RoleController');
Route::POST('/role/{id}/update','RoleController@update')->name('role.update');
Route::POST('/role/{id}/destroy','RoleController@destroy')->name('role.destroy');
});


Route::group(["prefix" => "admin/portal", "namespace" => "Admin\Portal"], function () {
    Route::get('/about','AboutController@index')->name('showAbout');
    Route::get('/about/index', 'AboutController@adminIndex')->name('about.index');
    Route::POST('/about/store', 'AboutController@clientCountStore')->name('about.store');
    Route::POST('/about/aboutstore', 'AboutController@aboutStore')->name('about.aboutstore');
    Route::POST('/about/{id}/update','AboutController@saveUserProfileImage')->name('about.userprofileimage');
    Route::get('/testimonial/index','TestimonialController@index')->name('testimonial.index');
    Route::get('/testimonial/create','TestimonialController@create')->name('testimonial.create');
    Route::get('/testimonial/{id}/edit','TestimonialController@edit')->name('testimonial.edit');
    Route::POST('/testimonial/store','TestimonialController@store')->name('testimonial.store');
    Route::POST('/testimonial/{id}/update','TestimonialController@update')->name('testimonial.update');
    Route::POST('/testimonial/{id}/destroy','TestimonialController@destroy')->name('testimonial.destroy');
});

/****************Frontend****************************************/
Route::get('/index','IndexController@index')->name('showIndex');




