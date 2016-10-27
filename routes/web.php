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
use inbloom\Model\Product\Materials;
use inbloom\Model\Product\Dimension;
use inbloom\Model\Product\Boxe_type;
use Illuminate\Support\Facades\Input;

Route::get('/',function(){
  return view('Logins\login');
});

//Modulo de inicio
Route::get('home','Login\LoginController@getHome');
Route::post('loginSucess_','Login\LoginController@getLoginSucess');
Route::get('products','Login\LoginController@getProducts');

//Ingreso de modulos
Route::get('vw_product',function(){
  //remove storage product
  Request::session()->forget('ProductMaterials');
  Request::session()->forget('ProductRecipe');
  Request::session()->forget('ProductMaterialsRecipe');
  $datos=[
    'tblProductos'=>DB::select('EXEC ASP_REP_PRODUCTS ?',array('1')),
  ];

  return view('products.main',['post'=>'true', 'tittle'=>'List of products','tblProducts'=>$datos]);
});

//insert productos
Route::get('setInsertProduct',function(){

  $datos=[
    'tblMaterialProduct'=>Materials::where('TYPE_MATERIALS', 'product')->get(),
    'tblMaterialItems'=>Materials::where('TYPE_MATERIALS', 'items')->get(),
    'tblVwBoxes'=>DB::select('select * from VW_BOXES'),
    'tblType'=>Items_type::orderBy('NAME_ITYPES')->get(),
    'tblColor'=>Color::orderBy('NAME_COLOR')->get(),
    'tblSpecie'=>Specie::orderBy('NAME_SPECIE')->get(),
    'tblGrade'=>Grade::orderBy('NAME_GRADE')->get(),
    'tblCut'=>Cut::orderBy('NAME_CUT')->get(),
    'tblProcess'=>Process::orderBy('TYPE_PROCESS')->get(),
    'tblPresentation'=>Presentation::orderBy('NAME_PTYPE')->get(),
    'tblVariety'=>Variety::orderBy('NAME_VARIETY')->get(),
  ];
  //dd($datos);
  return view('products.insert',['post'=>'true', 'tittle'=>"Product",'datos'=>$datos]);
});

Route::post('setAddProduct','Product\ProductController@setAddProduct');

Route::get('setDelMaterials',function(){ //Remove items materials
  if (Request::ajax()){
    $IdItemDel=Request::get('IdItemDel');
    $datosOk=[];
    $datosTemp=Request::session()->get('ProductMaterials');

    foreach ( $datosTemp as $productMaterials) {
      if ($productMaterials['IdItemMaterialsProd']!=$IdItemDel) {
        array_push($datosOk,[
          'IdItemMaterialsProd'=> $productMaterials['IdItemMaterialsProd'],
          'NomItemMaterialsProd'=> $productMaterials['NomItemMaterialsProd'],
          'QuantItemMaterialsProd'=> $productMaterials['QuantItemMaterialsProd'],
        ]);
      }
    }

    Request::session()->forget('ProductMaterials');
    Request::session()->set('ProductMaterials',$datosOk);
  }
});

Route::post('setAddInsertMaterial', function(){  //Add items materials
  if(Request::ajax()){

    $datos=[
      'IdItemMaterialsProd'=> Request::get('IdItemMaterialsProd'),
      'NomItemMaterialsProd'=> Request::get('NomItemMaterialsProd'),
      'QuantItemMaterialsProd'=> Request::get('QuantItemMaterialsProd'),
    ];

    Request::session()->push('ProductMaterials',$datos);

    return Response::json('Success Transaction');
  }
});

Route::post('setAddInsertMaterialsRecipe', function(){  //Add items materials recipe
  if(Request::ajax()){

    $datos=[
      'IdItemRecipe'=> Request::get('IdItemRecipe'),
      'IdMaterialsRecipe'=> Request::get('IdMaterialsRecipe'),
      'NomItemMaterialsRecipe'=> Request::get('NomItemMaterialsRecipe'),
      'QuantItemMaterialsRecipe'=> Request::get('QuantItemMaterialsRecipe'),
    ];

    Request::session()->push('ProductMaterialsRecipe',$datos);

    return Response::json(Request::session()->get('ProductMaterialsRecipe'));
  }
});

Route::get('setDelMaterialsRecipe',function(){ //Remove items materials
  if (Request::ajax()){
    $IdItemDel=Request::get('IdItemDel');
    $datosOk=[];
    $datosTemp=Request::session()->get('ProductMaterialsRecipe');

    foreach ( $datosTemp as $productMaterials) {
      if ($productMaterials['IdItemRecipe']!=$IdItemDel) {
        array_push($datosOk,[
          'IdItemRecipe'=> $productMaterials['IdItemRecipe'],
          'IdMaterialsRecipe'=> $productMaterials['IdMaterialsRecipe'],
          'NomItemMaterialsRecipe'=> $productMaterials['NomItemMaterialsRecipe'],
          'QuantItemMaterialsRecipe'=> $productMaterials['QuantItemMaterialsRecipe'],
        ]);
      }
    }

    Request::session()->forget('ProductMaterialsRecipe');
    Request::session()->set('ProductMaterialsRecipe',$datosOk);
  }
});

//Route::post('uploading','Product\ProductController@uploading');

Route::post('setAddInsertRecipe', function(){  //Add items materials
  if(Request::ajax()){

    $datosRecipe=[
      'Id_Recipe'=>Request::get('Id_Recipe'),
      'IdItemRecipeProd'=>Request::get('IdItemRecipeProd'),
      'IdSpecie'=>Request::get('IdSpecie'),
      'IdColor'=>Request::get('IdColor'),
      'IdProcess'=>Request::get('IdProcess'),
      'IdTypes'=>Request::get('IdTypes'),
      'IdCuts'=>Request::get('IdCuts'),
      'IdGrade'=>Request::get('IdGrade'),
      'IdVariety'=>Request::get('IdVariety'),
      'Quantity'=>Request::get('Quantity'),
    ];

    Request::session()->push('ProductRecipe',$datosRecipe);

    return Response::json('Success Transaction');
  }
});

Route::get('setDelRecipeItems',function(){ //Remove items materials
  if (Request::ajax()){
    $IdItemDel=Request::get('IdItemDel');
    $datosOk=[];
    $datosTemp=Request::session()->get('ProductRecipe');

    foreach ( $datosTemp as $product) {
      if ($product['IdItemRecipeProd']!=$IdItemDel) {
        array_push($datosOk,[
          'IdColor'=>$product['IdColor'],
          'IdProcess'=>$product['IdProcess'],
          'IdTypes'=>$product['IdTypes'],
          'IdCuts'=>$product['IdCuts'],
          'IdGrade'=>$product['IdGrade'],
          'IdVariety'=>$product['IdVariety'],
          'Quantity'=>$product['Quantity'],
        ]);
      }
    }

    Request::session()->forget('ProductRecipe');
    Request::session()->set('ProductRecipe',$datosOk);
  }
});

Route::get('updateSessionRoute',function(){
  if (Request::ajax()) {
    $idItemRecipe=Request::get('idItemRecipe');
    $dt=Request::session()->get('ProductMaterialsRecipe');
    $dtMat=[];
    if (isset($dt)) {
      foreach ($dt as $materialsRecipeItems) {
        if ($materialsRecipeItems['IdItemRecipe']==$idItemRecipe) {
          $dataMat=[
            'IdItemRecipe'=>$materialsRecipeItems['IdItemRecipe'],
            'IdMaterialsRecipe'=>$materialsRecipeItems['IdMaterialsRecipe'],
            'NomItemMaterialsRecipe'=>$materialsRecipeItems['NomItemMaterialsRecipe'],
            'QuantItemMaterialsRecipe'=>$materialsRecipeItems['QuantItemMaterialsRecipe'],
          ];
          array_push($dtMat,$dataMat);
        }
      }
    }
    return Response::json($dtMat);
  }
});

// Acceso al menu productos taxes
Route::get('vw_Taxes',function(){
  $datos=Taxe::get();
  return view('products.tools.taxe',['post'=>true,'tittle'=>" Taxe",'tblDatos'=>$datos]);
});

Route::post('setInsertTaxe','Product\Taxe\TaxeController@setInsertTaxe'); // Ejecuta insertar taxes

Route::post('setModificationTaxe','Product\Taxe\TaxeController@setModificationTaxe'); //Ejecuta modificacion taxes

Route::get('getDeleteTaxe','Product\Taxe\TaxeController@getDeleteTaxe'); //Ejecuta modificacion Product taxes

Route::post('setAddTypeRecipe',function(){
    if (Request::ajax()) {
      $datos=[
        'indexRecipe'=>Request::get('indexRecipe'),
        'IndexTypeRecipe'=>Request::get('IndexTypeRecipe'),
      ];
      Request::session()->push('Recipes',$datos);
    }
});

Route::get('getItemsRecipe',function(){
  if (Request::ajax()) {
    $idItemRecipe=Request::get('idBusca');
    $dt=Request::session()->get('ProductRecipe');
    $datosRecipe=[];

    if (isset($dt)) {
      foreach ($dt as $recipeItems) {
        if ($recipeItems['Id_Recipe']==$idItemRecipe) {
          $datos=DB::select('EXEC ASP_ITEMS_RECIPE ?,?,?,?,?,?,?,?',array($recipeItems['IdSpecie'], $recipeItems['IdColor'],$recipeItems['IdProcess'],$recipeItems['IdTypes'],$recipeItems['IdCuts'],$recipeItems['IdGrade'],$recipeItems['IdVariety'],$recipeItems['Quantity']));
          array_push($datosRecipe,$datos);
        }
      }
    }

    return Response::json($datosRecipe);
  }
});

// Acceso al menu productos varieties
Route::get('vw_Variety',function(){
  $datos=Variety::get();
  return view('products.tools.varieties',['post'=>true,'tittle'=>" Variety",'tblDatos'=>$datos]);
});
Route::post('setInsertVariety','Product\Variety\VarietyController@setInsertVariety'); // Ejecuta insertar varieties
Route::post('setModificationVariety','Product\Variety\VarietyController@setModificationVariety'); //Ejecuta modificacion varieties
Route::get('getDeleteVariety','Product\Variety\VarietyController@getDeleteVariety'); //Ejecuta modificacion varieties


// Acceso al menu productos species
Route::get('vw_Specie',function(){
  $datos=[
    'tblSpecie'=>DB::select('EXEC ASP_CONSULTASPECIE'),
    'tblTaxe'=>Taxe::orderBy('COD_TAX','NAME_TAX')->get(),
    'tblVariety'=>Variety::orderBy('NAME_VARIETY')->get(),
  ];
  return view('products.tools.species',['post'=>true,'tittle'=>" Specie",'tblDatos'=>$datos]);
});
Route::post('setInsertSpecies','Product\Species\SpeciesController@setInsertSpecies'); //Ejecuta insertar specie
Route::post('setModificationSpecies','Product\Species\SpeciesController@setModificationSpecies'); //Ejecuta modificacion specie
Route::get('getDeleteSpecies','Product\Species\SpeciesController@getDeleteSpecies'); //Ejecuta modificacion specie


// Acceso al menu productos process
Route::get('vw_Process',function(){
  $datos=Process::get();
  return view('products.tools.process',['post'=>true,'tittle'=>" Process",'tblDatos'=>$datos]);
});
Route::post('setInsertProcess','Product\Process\ProcessController@setInsertProcess'); // Ejecuta insertar process
Route::post('setModificationProcess','Product\Process\ProcessController@setModificationProcess'); //Ejecuta modificacion process
Route::get('getDeleteProcess','Product\Process\ProcessController@getDeleteProcess'); //Ejecuta modificacion process


// Acceso al menu productos presentation
Route::get('vw_Presentation',function(){
  $datos=Presentation::get();
  return view('products.tools.presentation',['post'=>true,'tittle'=>" Presentation",'tblDatos'=>$datos]);
});
Route::post('setInsertPresentation','Product\Presentation\PresentationController@setInsertPresentation'); // Ejecuta insertar presentation
Route::post('setModificationPresentation','Product\Presentation\PresentationController@setModificationPresentation'); //Ejecuta modificacion presentation
Route::get('getDeletePresentation','Product\Presentation\PresentationController@getDeletePresentation'); //Ejecuta modificacion presentation


// Acceso al menu productos item type
Route::get('vw_ItemTypes',function(){
  $datos=Items_type::get();
  return view('products.tools.itemTypes',['post'=>true,'tittle'=>" Item type",'tblDatos'=>$datos]);
});
Route::post('setInsertItemTypes','Product\ItemType\ItemTypeController@setInsertItemTypes'); // Ejecuta insertar items types
Route::post('setModificationItemType','Product\ItemType\ItemTypeController@setModificationItemType'); //Ejecuta modificacion items types
Route::get('getDeleteItemsTypes','Product\ItemType\ItemTypeController@getDeleteItemsTypes'); //Ejecuta modificacion items types

// Acceso al menu productos boxes type
Route::get('vw_BoxeTypes',function(){
  $datos=Boxe_type::get();
  return view('products.tools.boxeTypes',['post'=>true,'tittle'=>" Boxe type",'tblDatos'=>$datos]);
});
Route::post('setInsertBoxType','Product\BoxeType\BoxTypeController@setInsertBoxType'); // Ejecuta insertar items types
Route::post('setModificationBoxType','Product\BoxeType\BoxTypeController@setModificationBoxType'); //Ejecuta modificacion items types
Route::get('getDeleteBoxType','Product\BoxeType\BoxTypeController@getDeleteBoxType'); //Ejecuta modificacion items types


// Acceso al menu productos Grade
Route::get('vw_Grade',function(){
  $datos=Grade::get();
  return view('products.tools.grade',['post'=>true,'tittle'=>" Grade",'tblDatos'=>$datos]);
});
Route::post('setInsertGrade','Product\Grade\GradeController@setInsertGrade'); // Ejecuta insertar Grade
Route::post('setModificationGrade','Product\Grade\GradeController@setModificationGrade'); //Ejecuta modificacion Grade
Route::get('getDeleteGrade','Product\Grade\GradeController@getDeleteGrade'); //Ejecuta modificacion Grade


// Acceso al menu productos cut
Route::get('vw_Cut',function(){
  $datos=Cut::get();
  return view('products.tools.cut',['post'=>true,'tittle'=>" Cut",'tblDatos'=>$datos]);
});
Route::post('setInsertCut','Product\Cut\CutController@setInsertCut'); // Ejecuta insertar cut
Route::post('setModificationCut','Product\Cut\CutController@setModificationCut'); //Ejecuta modificacion cut
Route::get('getDeleteCut','Product\Cut\CutController@getDeleteCut'); //Ejecuta modificacion cut


// Acceso al menu productos color
Route::get('vw_Color',function(){
  $datos=Color::get();
  return view('products.tools.color',['post'=>true,'tittle'=>" Color",'tblDatos'=>$datos]);
});
Route::post('setInsertColor','Product\Color\ColorController@setInsertColor'); // Ejecuta insertar color
Route::post('setModificationColor','Product\Color\ColorController@setModificationColor'); //Ejecuta modificacion color
Route::get('getDeleteColor','Product\Color\ColorController@getDeleteColor'); //Ejecuta modificacion color

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

  return view('products.recipes.items',['post'=>true,'tittle'=>" Items",'datos'=>$datos]);
});

Route::post('setInsertItems','Product\Items\ItemsController@setInsertItems');
Route::post('setModificationItems','Product\Items\ItemsController@setModificationItems');
Route::get('getDeleteItems','Product\Items\ItemsController@getDeleteItems');

//Recipes
Route::get('vw_recipes',function(){
  $datos=Recipe::get();
  return view('products.recipes.recipe_main',['tittle'=>" Recipe",'datos'=>$datos]);
});

//Materials
Route::get('vw_material',function(){
  $datos=[
    'tblMaterial'=>Materials::orderBy('NAME_MATERIALS', 'TYPE_MATERIALS')->get()
  ];
  return view('products.recipes.materials',['post'=>true,'tittle'=>" Materials", 'datos'=>$datos]);
});

Route::post('setInsertMaterial','Product\Material\MaterialController@setInsertMaterial');
Route::post('setModificationMaterial','Product\Material\MaterialController@setModificationMaterial');
Route::get('getDeleteMaterial','Product\Material\MaterialController@getDeleteMaterial');

Route::get('vw_boxes',function(){
  $datos=[
    'tblTypes'=>DB::select('select ID_BTYPE, TYPEBOXE_BTYPE from BOX_TYPES'),
    'tblBoxes'=>DB::select('select * from VW_REP_BOXES'),
  ];
  return view('products.recipes.boxes',['post'=>'true','tittle'=>'Boxes','datos'=>$datos]);
});
Route::post('setAddBoxes','Product\Boxes\BoxesController@setAddBoxes');
