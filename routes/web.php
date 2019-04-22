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

// ADMIN ROUTE GROUP ========================
Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function(){

	Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@index']);

	Route::resource('product', 'ProductController');
	Route::resource('category', 'CategoryController');
	Route::resource('tag', 'TagController');
	Route::resource('order', 'OrderController');

});


// CUSTOMER ROUTE GROUP ========================
Route::group(['as'=>'customer.', 'prefix'=>'customer', 'namespace'=>'Customer', 'middleware'=>['auth', 'customer']], function(){

	Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'DashboardController@index']);

});


Auth::routes();


// 	FORNTEND ROUTE ===================
Route::get('/', 'HomeController@index')->name('home');
Route::get('product/{slug}', ['as'=>'product.detail', 'uses'=>'ProductController@detail']);


Route::group(['prefix'=>'carts'], function(){
	Route::get('index', ['as'=>'carts.index', 'uses'=>'CartController@index']);
	Route::post('/store/{id}', ['as'=>'carts.store', 'uses'=>'CartController@store']);
	Route::delete('/delete/{id}', ['as'=>'carts.delete', 'uses'=>'CartController@destroy']);
});


Route::group(['prefix'=>'checkout'], function(){
	
	Route::get('/', ['as'=>'checkout', 'uses'=>'CheckoutController@index']);
	
});

Route::group(['prefix'=>'order'], function(){
	
	Route::post('/store', ['as'=>'order.store', 'uses'=>'OrderController@store']);
	
});