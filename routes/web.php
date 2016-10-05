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

//Modulo de productos
Route::get('getListProduct','Product\ProductController@getListProducts'); //llamada a la lista
Route::get('setInsertProduct','Product\ProductController@setInsertProducts'); //llamada al ingreso
Route::get('getToolsProduct','Product\ProductController@getToolsProducts'); //llamada a herramientas

// Acceso al menu productos taxes
Route::get('vw_Taxes',function(){
  $datos=Taxe::get();
  return view('products.taxe',['tblDatos'=>$datos]);
});

// Acceso al menu productos varieties
Route::get('vw_Variety',function(){
  $datos=Variety::get();
  return view('products.varieties',['tblDatos'=>$datos]);
});

// Acceso al menu productos species
Route::get('vw_Specie',function(){
  $datos=Specie::get();
  return view('products.species',['tblDatos'=>$datos]);
});

// Acceso al menu productos species
Route::get('vw_Process',function(){
  $datos=Process::get();
  return view('products.process',['tblDatos'=>$datos]);
});

// Acceso al menu productos presentation
Route::get('vw_Presentation',function(){
  $datos=Presentation::get();
  return view('products.presentation',['tblDatos'=>$datos]);
});

// Acceso al menu productos presentation
Route::get('vw_ItemTypes',function(){
  $datos=Items_type::get();
  return view('products.itemTypes',['tblDatos'=>$datos]);
});

// Acceso al menu productos presentation
Route::get('vw_Grade',function(){
  $datos=Grade::get();
  return view('products.grade',['tblDatos'=>$datos]);
});

// Acceso al menu productos presentation
Route::get('vw_Cut',function(){
  $datos=Cut::get();
  return view('products.cut',['tblDatos'=>$datos]);
});

// Acceso al menu productos presentation
Route::get('vw_Color',function(){
  $datos=Color::get();
  return view('products.color',['tblDatos'=>$datos]);
});


//Modulo de Species
Route::post('setInsertSpecies','Producto\ProductController@setInsertSpecies');
/*
Route::post('setModificationSpecies','Producto\ProductController@setModificationSpecies'); //Ejecuta modificacion specie
Route::get('getDeleteSpecie/{ID_SPECIE}','Producto\ProductController@getDeleteSpecies'); //Ejecuta modificacion specie

//Modulo de Item Types
Route::post('setInsertItemTypes','Producto\ProductController@setInsertItemTypes'); // Ejecuta insertar items types
Route::post('setModificationItemType','Producto\ProductController@setModificationItemType'); //Ejecuta modificacion items types
Route::get('getDeleteItemsTypes/{ID_ITYPES}','Producto\ProductController@getDeleteItemsTypes'); //Ejecuta modificacion items types

//Modulo de Product Types
Route::post('setInsertPresentation','Producto\ProductController@setInsertPresentation'); // Ejecuta insertar Product types
Route::post('setModificationPresentation','Producto\ProductController@setModificationPresentation'); //Ejecuta modificacion Product types
Route::get('getDeletePresentation/{ID_PTYPE}','Producto\ProductController@getDeletePresentation'); //Ejecuta modificacion Product types

//Modulo de Process
Route::post('setInsertProcess','Producto\ProductController@setInsertProcess'); // Ejecuta insertar Product types
Route::post('setModificationProcess','Producto\ProductController@setModificationProcess'); //Ejecuta modificacion Product types
Route::get('getDeleteProcess/{ID_PROCESS}','Producto\ProductController@getDeleteProcess'); //Ejecuta modificacion Product types

//Modulo de Variety
Route::post('setInsertVariety','Producto\ProductController@setInsertVariety'); // Ejecuta insertar Product types
Route::post('setModificationVariety','Producto\ProductController@setModificationVariety'); //Ejecuta modificacion Product types
Route::get('getDeleteVariety/{ID_VARIETY}','Producto\ProductController@getDeleteVariety'); //Ejecuta modificacion Product types

//Modulo de Color
Route::post('setInsertColor','Producto\ProductController@setInsertColor'); // Ejecuta insertar Product types
Route::post('setModificationColor','Producto\ProductController@setModificationColor'); //Ejecuta modificacion Product types
Route::get('getDeleteColor/{ID_COLOR}','Producto\ProductController@getDeleteColor'); //Ejecuta modificacion Product types

//Modulo de Grades
Route::post('setInsertGrade','Producto\ProductController@setInsertGrade'); // Ejecuta insertar Product types
Route::post('setModificationGrade','Producto\ProductController@setModificationGrade'); //Ejecuta modificacion Product types
Route::get('getDeleteGrade/{ID_GRADE}','Producto\ProductController@getDeleteGrade'); //Ejecuta modificacion Product types

//Modulo de Cuts
Route::post('setInsertCut','Producto\ProductController@setInsertCut'); // Ejecuta insertar Product types
Route::post('setModificationCut','Producto\ProductController@setModificationCut'); //Ejecuta modificacion Product types
Route::get('getDeleteCut/{ID_CUT}','Producto\ProductController@getDeleteCut'); //Ejecuta modificacion Product types
*/
