<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',function(){
  return view('Logins\login');
});

//Modulo de inicio
Route::get('home','Login\LoginController@getHome');

Route::post('loginSucess_','Login\LoginController@getLoginSucess');

Route::get('products','Login\LoginController@getProducts');

//Modulo de productos
Route::get('getListProduct','Producto\ProductController@getListProducts'); //llamada a la lista

Route::get('setInsertProduct','Producto\ProductController@setInsertProducts'); //llamada al ingreso

Route::get('getToolsProduct','Producto\ProductController@getToolsProducts'); //llamada a herramientas
