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
use inbloom\Model\Product\Cost;
use inbloom\Model\Product\Item;
use inbloom\Model\Product\Recipe;

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

// Acceso al menu productos taxes
Route::get('vw_Taxes',function(){
  $datos=Taxe::get();
  return view('products.taxe',['tblDatos'=>$datos]);
});
Route::post('setInsertTaxe','Product\ProductController@setInsertTaxe'); // Ejecuta insertar taxes
Route::post('setModificationTaxe','Product\ProductController@setModificationTaxe'); //Ejecuta modificacion taxes
Route::get('getDeleteTaxe','Product\ProductController@getDeleteTaxe'); //Ejecuta modificacion Product taxes


// Acceso al menu productos varieties
Route::get('vw_Variety',function(){
  $datos=Variety::get();
  return view('products.varieties',['tblDatos'=>$datos]);
});
Route::post('setInsertVariety','Product\ProductController@setInsertVariety'); // Ejecuta insertar varieties
Route::post('setModificationVariety','Product\ProductController@setModificationVariety'); //Ejecuta modificacion varieties
Route::get('getDeleteVariety','Product\ProductController@getDeleteVariety'); //Ejecuta modificacion varieties


// Acceso al menu productos species
Route::get('vw_Specie',function(){
  $datos=[
    'tblSpecie'=>DB::select('EXEC ASP_CONSULTASPECIE'),
    'tblTaxe'=>Taxe::orderBy('COD_TAX','NAME_TAX')->get(),
    'tblVariety'=>Variety::orderBy('NAME_VARIETY')->get(),
  ];
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
Route::post('setInsertProcess','Product\ProductController@setInsertProcess'); // Ejecuta insertar process
Route::post('setModificationProcess','Product\ProductController@setModificationProcess'); //Ejecuta modificacion process
Route::get('getDeleteProcess','Product\ProductController@getDeleteProcess'); //Ejecuta modificacion process


// Acceso al menu productos presentation
Route::get('vw_Presentation',function(){
  $datos=Presentation::get();
  return view('products.presentation',['tblDatos'=>$datos]);
});
Route::post('setInsertPresentation','Product\ProductController@setInsertPresentation'); // Ejecuta insertar presentation
Route::post('setModificationPresentation','Product\ProductController@setModificationPresentation'); //Ejecuta modificacion presentation
Route::get('getDeletePresentation','Product\ProductController@getDeletePresentation'); //Ejecuta modificacion presentation


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
Route::post('setInsertGrade','Product\ProductController@setInsertGrade'); // Ejecuta insertar Grade
Route::post('setModificationGrade','Product\ProductController@setModificationGrade'); //Ejecuta modificacion Grade
Route::get('getDeleteGrade','Product\ProductController@getDeleteGrade'); //Ejecuta modificacion Grade


// Acceso al menu productos cut
Route::get('vw_Cut',function(){
  $datos=Cut::get();
  return view('products.cut',['tblDatos'=>$datos]);
});
Route::post('setInsertCut','Product\ProductController@setInsertCut'); // Ejecuta insertar cut
Route::post('setModificationCut','Product\ProductController@setModificationCut'); //Ejecuta modificacion cut
Route::get('getDeleteCut','Product\ProductController@getDeleteCut'); //Ejecuta modificacion cut


// Acceso al menu productos color
Route::get('vw_Color',function(){
  $datos=Color::get();
  return view('products.color',['tblDatos'=>$datos]);
});
Route::post('setInsertColor','Product\ProductController@setInsertColor'); // Ejecuta insertar color
Route::post('setModificationColor','Product\ProductController@setModificationColor'); //Ejecuta modificacion color
Route::get('getDeleteColor','Product\ProductController@getDeleteColor'); //Ejecuta modificacion color

//items
Route::get('vw_Items',function(){
  $datos=[
      'tblType'=>Items_type::get(),
      'tblColor'=>Color::get(),
      'tblSpecie'=>Specie::get(),
      'tblGrade'=>Grade::get(),
      'tblCut'=>Cut::get(),
      'tblProcess'=>Process::get(),
      'tblItems'=>DB::select('EXEC ASP_CONSULTA_ITEMS'),
  ];

  return view('products.items',['datos'=>$datos]);
});
Route::post('setInsertItems','Product\ProductController@setInsertItems');
Route::post('setModificationItems','Product\ProductController@setModificationItems');
Route::get('getDeleteItems','Product\ProductController@getDeleteItems');

//Recipes
Route::get('vw_recipes',function(){
  $datos=Recipe::get();

  return view('products.recipes',['datos'=>$datos]);
});
