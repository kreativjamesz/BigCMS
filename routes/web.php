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

Route::get('/', 'PagesController@index');
Route::get('/blog', 'PagesController@blogs');
Route::get('/product', 'PagesController@products');

Auth::routes();

Route::group(['prefix'=>'dashboard', 'namespace'=>'Dashboard', 'middleware'=>'role:superadministrator|administrator|manager|supervisor'], function(){
	Route::resource('product','ProductController');
});

Route::group(['prefix'=>'dashboard', 'namespace'=>'Dashboard', 'middleware'=>'role:superadministrator|administrator|manager|supervisor|user'], function(){
	Route::get('/','DashboardController@index');
	Route::get('/profile','ProfileController@index');
	Route::post('/profile/update','ProfileController@updateProfile')->name('updateProfile');
});