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

// 	FORNTEND PAGEs ROUTE ===================
Route::get('/', 'HomeController@index')->name('home');
Route::get('product/{slug}', ['as'=>'product.detail', 'uses'=>'ProductController@detail']);

// OTHERS PAGES in PageController ==========
Route::get('category/{slug}', ['as'=>'category.show', 'uses'=>'PageController@getCategory']);
Route::get('/search', ['as'=>'search', 'uses'=>'PageController@getSearch']);

Route::get('/about', ['as'=>'about', 'uses'=>'PageController@getAbout']);
Route::get('/contact', ['as'=>'contact', 'uses'=>'PageController@getContact']);
Route::get('/terms-conditions', ['as'=>'terms-conditions', 'uses'=>'PageController@getTermscondition']);


// RUN CONFIGURATION ROUTE ===========

// Clear Configuration
Route::get('/config-clear', function() {
	Artisan::call('config:clear');
});

//Clear cache:
Route::get('/cache-clear', function() {
	Artisan::call('cache:clear');
});

//Clear configuration cache:
Route::get('/config-cache', function() {
	Artisan::call('config:Cache');
	});

// Generate app key
Route::get('/key', function(){
     Artisan::call('key:generate');
});
