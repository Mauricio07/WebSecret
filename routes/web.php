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
use inbloom\Model\Product\Taxe;
use inbloom\Model\Product\Variety;
use inbloom\Model\Product\Specie;
use inbloom\Model\Product\Process;
use inbloom\Model\Product\Presentation;
use inbloom\Model\Product\Items_type;
use inbloom\Model\Product\Grade;
use inbloom\Model\Product\Cut;
use inbloom\Model\Product\Color;

Route::get('/',function(){
  return view('Logins\login');
});

//Modulo de inicio
Route::get('home','Login\LoginController@getHome');
Route::post('loginSucess_','Login\LoginController@getLoginSucess');
Route::get('products','Login\LoginController@getProducts');

//Ingreso de modulos
Route::get('getListProduct',function(){
  return view('products.main');
});

//Modulo de productos
//Route::post('setInsertProduct','Product\ProductController@setInsertProducts'); //llamada al ingreso


// Acceso al menu productos taxes
Route::get('vw_Taxes',function(){
  $datos=Taxe::get();
  return view('products.taxe',['tblDatos'=>$datos]);
});
Route::post('setInsertTaxe','Product\ProductController@setInsertTaxe'); // Ejecuta insertar Product types
Route::post('setModificationTaxe','Product\ProductController@setModificationTaxe'); //Ejecuta modificacion Product types
Route::get('getDeleteTaxe','Product\ProductController@getDeleteTaxe'); //Ejecuta modificacion Product types


// Acceso al menu productos varieties
Route::get('vw_Variety',function(){
  $datos=Variety::get();
  return view('products.varieties',['tblDatos'=>$datos]);
});
Route::post('setInsertVariety','Product\ProductController@setInsertVariety'); // Ejecuta insertar Product types
Route::post('setModificationVariety','Product\ProductController@setModificationVariety'); //Ejecuta modificacion Product types
Route::get('getDeleteVariety','Product\ProductController@getDeleteVariety'); //Ejecuta modificacion Product types


// Acceso al menu productos species
Route::get('vw_Specie',function(){
  $datos=Specie::get();
  return view('products.species',['tblDatos'=>$datos]);
});
Route::post('setInsertSpecies','Product\ProductController@setInsertSpecies'); //Ejecuta insertar specie
Route::post('setModificationSpecies','Product\ProductController@setModificationSpecies'); //Ejecuta modificacion specie
Route::get('getDeleteSpecies','Product\ProductController@getDeleteSpecies'); //Ejecuta modificacion specie


// Acceso al menu productos process
Route::get('vw_Process',function(){
  $datos=Process::get();
  return view('products.process',['tblDatos'=>$datos]);
});
Route::post('setInsertProcess','Product\ProductController@setInsertProcess'); // Ejecuta insertar Product types
Route::post('setModificationProcess','Product\ProductController@setModificationProcess'); //Ejecuta modificacion Product types
Route::get('getDeleteProcess','Product\ProductController@getDeleteProcess'); //Ejecuta modificacion Product types


// Acceso al menu productos presentation
Route::get('vw_Presentation',function(){
  $datos=Presentation::get();
  return view('products.presentation',['tblDatos'=>$datos]);
});
Route::post('setInsertPresentation','Product\ProductController@setInsertPresentation'); // Ejecuta insertar Product types
Route::post('setModificationPresentation','Product\ProductController@setModificationPresentation'); //Ejecuta modificacion Product types
Route::get('getDeletePresentation','Product\ProductController@getDeletePresentation'); //Ejecuta modificacion Product types


// Acceso al menu productos item type
Route::get('vw_ItemTypes',function(){
  $datos=Items_type::get();
  return view('products.itemTypes',['tblDatos'=>$datos]);
});
Route::post('setInsertItemTypes','Product\ProductController@setInsertItemTypes'); // Ejecuta insertar items types
Route::post('setModificationItemType','Product\ProductController@setModificationItemType'); //Ejecuta modificacion items types
Route::get('getDeleteItemsTypes','Product\ProductController@getDeleteItemsTypes'); //Ejecuta modificacion items types


// Acceso al menu productos Grade
Route::get('vw_Grade',function(){
  $datos=Grade::get();
  return view('products.grade',['tblDatos'=>$datos]);
});
Route::post('setInsertGrade','Product\ProductController@setInsertGrade'); // Ejecuta insertar Product types
Route::post('setModificationGrade','Product\ProductController@setModificationGrade'); //Ejecuta modificacion Product types
Route::get('getDeleteGrade','Product\ProductController@getDeleteGrade'); //Ejecuta modificacion Product types


// Acceso al menu productos cut
Route::get('vw_Cut',function(){
  $datos=Cut::get();
  return view('products.cut',['tblDatos'=>$datos]);
});
Route::post('setInsertCut','Product\ProductController@setInsertCut'); // Ejecuta insertar Product types
Route::post('setModificationCut','Product\ProductController@setModificationCut'); //Ejecuta modificacion Product types
Route::get('getDeleteCut','Product\ProductController@getDeleteCut'); //Ejecuta modificacion Product types


// Acceso al menu productos color
Route::get('vw_Color',function(){
  $datos=Color::get();
  return view('products.color',['tblDatos'=>$datos]);
});
Route::post('setInsertColor','Product\ProductController@setInsertColor'); // Ejecuta insertar Product types
Route::post('setModificationColor','Product\ProductController@setModificationColor'); //Ejecuta modificacion Product types
Route::get('getDeleteColor','Product\ProductController@getDeleteColor'); //Ejecuta modificacion Product types
