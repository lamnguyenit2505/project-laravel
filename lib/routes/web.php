<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','FrontendController@index')->name('home');
Route::get('/details/{id}/{slug}.html','FrontendController@details')->name('details');
Route::post('/details/{id}/{slug}.html',"FrontendController@postComment");
Route::get('/category/{id}/{slug}.html',"FrontendController@getCate");
Route::get('/search','FrontendController@getSearch');

Route::group(['prefix' => 'cart'],function(){

	Route::get('/add/{id}', 'CartController@getAddCart');
	Route::get('/show', 'CartController@showCart');
	Route::get('/delete/{id}','CartController@deleteCart');
	Route::get('/update','CartController@updateCart');
	Route::post('/show', 'CartController@postMail');
	Route::get('/complete','CartController@complete');
});

Route::group(['namespace' => 'Admin'],function(){
	Route::group(['prefix' => 'login', 'middleware' => 'CheckLogedIn'], function(){
		Route::get('/','LoginController@getLogin');
		Route::POST('/','LoginController@postLogin');
	});

	Route::get('logout','HomeController@getLogout')->name('logout');

	Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogedOut'],function(){

		Route::get('home', 'HomeController@getHome');

		Route::group(['prefix' => 'category'],function(){

			Route::get('/','CategoryController@getCate');
			Route::post('/','CategoryController@addCate');
			Route::get('edit/{id}','CategoryController@getEditCate');
			Route::post('edit/{id}','CategoryController@storeCate');
			Route::get('delete/{id}','CategoryController@getDeleteCate');
		});


		Route::group(['prefix' => 'product'],function(){
			Route::get('/','ProductController@index');
			Route::get('/addpro','ProductController@getAddPro');
			Route::post('/addpro','ProductController@addPro');
			Route::get('edit/{id}','ProductController@getEditPro');	
			Route::post('edit/{id}','ProductController@updatePro');
			Route::get('delete/{id}','ProductController@deletePro');	
	    });
	});

});