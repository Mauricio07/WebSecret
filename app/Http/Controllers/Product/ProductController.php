<?php

namespace inbloom\Http\Controllers\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use inbloom\Http\Controllers\Controller;
use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Product\InsertModifyProductRequest;

use inbloom\Model\Product\Variety;
use inbloom\Model\Product\Product;
use inbloom\Model\Product\Specie;
use inbloom\Model\Product\Process;
use inbloom\Model\Product\Presentation;
use inbloom\Model\Product\Items_type;
use inbloom\Model\Product\Grade;
use inbloom\Model\Product\Cut;
use inbloom\Model\Product\Color;
use inbloom\Model\Product\Materials;
use Validator;

class ProductController extends Controller
{
  var $arrayRecipe; //Recetas
  var $arrayProductRecipe; //bonches que forman la receta
  var $arrayProductMaterialsRecipe; //materials items recipes
  var $arrayProductMaterials; //Materiales de la receta
  var $errors;


  public function setInsertProduct(InsertModifyProductRequest $request){
    $this->limpiezaSession($request);
    $datos=$this->loadParameter();
    return view('products.insert',['post'=>'true', 'tittle'=>"Product",'datos'=>$datos]);
  }

  public function getEditProduct(InsertModifyProductRequest $request){
    $this->limpiezaSession($request);

    $idProduct=$request->get('txtidEdit');

    $datos=$this->loadParameter();

    $dtInformacion=[
      'infoProducto'=>DB::selectOne('EXEC ASP_HEADER_PRODUCTS ?',array($idProduct)),
    ];

    return view('products.edit',['post'=>'true','tittle'=>'Edit Products','datos'=>$datos, 'dtInformacion'=>$dtInformacion]);
  }

  //ingreso en la BDD de productos
  public function setAddProduct(InsertModifyProductRequest $request){
    //Add recipe head
    $this->getSession($request);

    $sintaxisHeaderRecipe='EXEC SP_ADD_UPDATE_RECIPE_HEADER ?,?';
    $sintaxisRecipeItems='EXEC SP_ADD_ITEM_RECIPE ?,?,?,?,?,?,?,?,?';
    $sintaxisMaterialsRecipe='EXEC SP_ADD_MATERIAL_RECIPE ?,?,?';
    $sintaxisProducts='EXEC SP_ADD_UPDATE_PRODUCTS ?,?,?,?,?,?,?,?,?,? ';
    $sintaxisMaterialProducts='EXEC SP_ADD_MATERIALS_PRODUCT ?,?,? ';

    //Validation Session

    $validaCode=DB::selectOne('select CODE_PRODUCT from products where CODE_PRODUCT='.trim($request->get('txtCodeProduct')));

    if (!isset($validaCode)) {
      $idUpdateProduct=0;
      $this->setInsertUpdateItemsMaterials($idUpdateProduct, $request, $sintaxisHeaderRecipe, $sintaxisRecipeItems, $sintaxisMaterialsRecipe, $sintaxisProducts, $sintaxisMaterialProducts);
      return redirect('vw_product')->with('message','Save');
    }else{
      $this->errors=['ProductExisting'=>'It has existing code product'];
      return redirect('setInsertProduct')->withErrors($this->errors);
    }

  }

    //Cambio de estado BDD
  public function getDeleteProduct(Request $request){
      Product::where('ID_PRODUCT', $request->get('txtCodeDel'))
          ->update([
            'DATEDELETE_PRODUCT'=>date('Ymd H:i:s'),
            'STATUS_PRODUCT'=>'-1'
          ]);
      return redirect('vw_product')->with('message','Delete');
    }

    //Save edit product en BDD

  public function setEditProduct(InsertModifyProductRequest $request){
    $this->getSession($request);

    $sintaxisHeaderRecipe='EXEC SP_ADD_UPDATE_RECIPE_HEADER ?,?';
    $sintaxisRecipeItems='EXEC SP_ADD_ITEM_RECIPE ?,?,?,?,?,?,?,?,?';
    $sintaxisMaterialsRecipe='EXEC SP_ADD_MATERIAL_RECIPE ?,?,?';
    $sintaxisProducts='EXEC SP_ADD_UPDATE_PRODUCTS ?,?,?,?,?,?,?,?,?,? ';
    $sintaxisMaterialProducts='EXEC SP_ADD_MATERIALS_PRODUCT ?,?,? ';

    $idUpdateProduct=$request->get('txtIdProduct');
    //borrado
    $seguir=DB::selectOne('EXEC SP_UPDATE_PRODUCTS ?',array($idUpdateProduct));

    $this->setInsertUpdateItemsMaterials($idUpdateProduct, $request, $sintaxisHeaderRecipe, $sintaxisRecipeItems, $sintaxisMaterialsRecipe, $sintaxisProducts, $sintaxisMaterialProducts);
    return redirect('vw_product')->with('message','Edit');
  }

/*
* ===============================================================================================
                             Metodos Materials Products
* ===============================================================================================
*/

  //add new materials product
  public function setAddMaterialProd(Request $request){
    //Validation
    $datosMat=$request->session()->get('ProductMaterials');
    $realizar=true;

    if(isset($datosMat)) {
      foreach ($datosMat as $dt) {
        if ($dt['IdMaterialsProd']==$request->get('IdMaterialsProd')) {
          $realizar=false;
          break;
        }
      }
    }

    if ($realizar) {
      $datos=[
        'IdMaterialsProd'=> $request->get('IdMaterialsProd'),
        'NomMaterialsProd'=> $request->get('NomMaterialsProd'),
        'QuantMaterialsProd'=> $request->get('QuantMaterialsProd'),
      ];
      $messages='Success Transaction';
      $request->session()->push('ProductMaterials',$datos);
    }else{
      $messages='';
    }
    return $messages;
  }

  //Deleting session
  public function setDeleteMaterialsProd(Request $request){

      $IdItemDel=$request->get('IdItemDel');

      $datosTemp=$request->session()->get('ProductMaterials');
      $request->session()->forget('ProductMaterials');

      foreach ( $datosTemp as $productMaterials) {
        if ($productMaterials['IdMaterialsProd']!=$IdItemDel) {
          $datosOk=[
            'IdMaterialsProd'=> $productMaterials['IdMaterialsProd'],
            'NomMaterialsProd'=> $productMaterials['NomMaterialsProd'],
            'QuantMaterialsProd'=> $productMaterials['QuantMaterialsProd'],
          ];
          $request->session()->push('ProductMaterials',$datosOk);
        }
      }
    }

    //barrido de procedimientos para almacenar

  public function loadMaterials(Request $request){
      $idProduct=$request->get('idProduct');
      $arrayDt=$request->session()->get('ProductMaterials');

      if (!isset($arrayDt)) {
        $request->session()->forget('ProductMaterials');
        $dato=DB::select('EXEC ASP_MATERIALS_PRODUCTS ?',array($idProduct));

        foreach ($dato as $dt) {
          $arrayDt=[
            'IdMaterialsProd'=> $dt->ID_MATERIAL,
            'NomMaterialsProd'=> $dt->NAME_MATERIALS,
            'QuantMaterialsProd'=> $dt->QUANTITY_PRODMAT,
          ];
          $request->session()->push('ProductMaterials',$arrayDt);
        }
      }
      return $request->session()->get('ProductMaterials');
    }

/*
* ===============================================================================================
                             Metodos Recipe
* ===============================================================================================
*/

  //Add new register Recipe
  public function setAddTypeRecipe(Request $request){
    $datosRecipe=$request->session()->get('Recipes');
    $realizar=true;
    if (isset($datosRecipe)) {
      foreach ($datosRecipe as $dt) {
        if ($dt['IndexTypeRecipe']==$request->get('IndexTypeRecipe')) {
          $realizar=false;
          break;
        }
      }
    }

    if ($realizar) {
      $datos=[
        'IndexTypeRecipe'=>$request->get('IndexTypeRecipe'),
        'NameTypeRecipe'=>$request->get('NameTypeRecipe'),
        //'QuantityRecipe'=>$request->get('QuantityRecipe'),
      ];
      $request->session()->push('Recipes',$datos);
      $messages='Success Transaction';
    }else{
      $messages='';
    }
      return $messages;
  }

  public function setDelTypeRecipe(Request $request){

    $IdItemDel=$request->get('IdItemDel');
    $datosRecipe=$request->session()->get('Recipes');
    $request->session()->forget('Recipes'); //clear session
    if(isset($datosRecipe)){
        foreach ($datosRecipe as $dt) {
          if ($dt['IndexTypeRecipe']!=$IdItemDel) {
            $arrayDatosOk=[
              'IndexTypeRecipe'=>$dt['IndexTypeRecipe'],
              'NameTypeRecipe'=>$dt['NameTypeRecipe'],
              //'QuantityRecipe'=>$dt['QuantityRecipe'],
            ];
            $request->session()->push('Recipes',$arrayDatosOk);
          }
        }
    }
  }

  //load Recipes
  public function getSessionRecipes(Request $request){
      $idProduct=$request->get('idProduct');
      $arrayDt=$request->session()->get('Recipes');
      if (!isset($arrayDt)) {
        $request->session()->forget('Recipes');
        $arrayDt=[];
        $datoR=DB::select('EXEC ASP_RECIPE_PRODUCTS ?',array($idProduct));
        foreach ($datoR as $dt) {
          //'IndexRecipe'=>$dt['IndexRecipe'],
          $arrayDt=[
            //'IndexRecipe'=>$dt->ID_RECIPE,
            'IndexTypeRecipe'=>$dt->ID_PTYPE,
            'NameTypeRecipe'=>$dt->NAME_PTYPE,
            //'QuantityRecipe'=>$dt->PACK,
          ];
          $request->session()->push('Recipes',$arrayDt);
        }
      }
      return $request->session()->get('Recipes');
    }


/*
* ===============================================================================================
                           Metodos Items Recipe
* ===============================================================================================
*/

  //add new register items Recipes
  public function setAddItemRecipe(Request $request){
    $datosRecipe=[
      'Id_Recipe'=>$request->get('Id_Recipe'),
      'IdItemRecipeProd'=>$request->get('IdItemRecipeProd'),
      'IdSpecie'=>$request->get('IdSpecie'),
      'IdColor'=>$request->get('IdColor'),
      'IdProcess'=>$request->get('IdProcess'),
      'IdTypes'=>$request->get('IdTypes'),
      'IdCuts'=>$request->get('IdCuts'),
      'IdGrade'=>$request->get('IdGrade'),
      'IdVariety'=>$request->get('IdVariety'),
      'Quantity'=>$request->get('Quantity'),
    ];

    $request->session()->push('ProductRecipe',$datosRecipe);
    return 'Success Transaction';
  }
    //load items
  public function getSessionItemRecipe(Request $request){
      $arrayDt=$request->session()->get('ProductRecipe');
      if (!isset($arrayDt)) {
        $request->session()->forget('ProductRecipe');
        $datoI=DB::select('EXEC ASP_RECIPES_ITEMS ?,?',array($request->get('idProduct'), $request->get('idRecipe')));

        foreach ($datoI as $dt) {
          $arrayDt=[
          'Id_Recipe'=>$dt->ID_RECIPE,
          'IdItemRecipeProd'=>$dt->ID_ITEM,
          'IdSpecie'=>$dt->ID_SPECIE,
          'IdColor'=>$dt->ID_COLOR,
          'IdProcess'=>$dt->ID_PROCESS,
          'IdTypes'=>$dt->ID_ITYPES,
          'IdCuts'=>$dt->ID_CUT,
          'IdGrade'=>$dt->ID_GRADE,
          'IdVariety'=>$dt->ID_VARIETY,
          'Quantity'=>$dt->QUANTITY_RECIPEITEM,
          ];
          $request->session()->push('ProductRecipe',$arrayDt);
        }
      }
      return $request->session()->get('ProductRecipe');
    }

  public function getItemsRecipes(Request $request){
      $request->session()->forget('ReporteProductRecipe'); //session temporal reporte

      $dt=$request->session()->get('ProductRecipe');

      if (isset($dt)) {
        $idItemRecipe=$request->get('idBusca');
        foreach ($dt as $recipeItems) {
          //if ($recipeItems['Id_Recipe']==$idItemRecipe) {
            $datos=DB::select('EXEC ASP_ITEMS_RECIPE ?,?,?,?,?,?,?,?,?,?',array($recipeItems['IdSpecie'], $recipeItems['IdColor'],$recipeItems['IdProcess'],$recipeItems['IdTypes'],$recipeItems['IdCuts'],$recipeItems['IdGrade'],$recipeItems['IdVariety'],$recipeItems['Quantity'], $recipeItems['IdItemRecipeProd'], $recipeItems['Id_Recipe']));
            //array_push($datosRecipe,$datos);
            $request->session()->push('ReporteProductRecipe',$datos);
          //}
        }
      }

      return $request->session()->get('ReporteProductRecipe');

    }

  /*
  * ===============================================================================================
                             Metodos materials Recipe
  * ===============================================================================================
  */

public function setAddInsertMaterialsRecipe(Request $request){

  $datos=$request->session()->get('ProductMaterialsRecipe');
  $bandera=true;

  if (isset($datos)) {
    foreach ($datos as $dt) {
        if ($request->get('IdMaterialsRecipe')==$dt['IdMaterialsRecipe']) {
          $bandera=false;
        }
    }
  }

  if ($bandera) {
    $datos=[
      'IdRecipe'=> $request->get('IdRecipe'),
      'IdMaterialsRecipe'=> $request->get('IdMaterialsRecipe'),
      'NomItemMaterialsRecipe'=> $request->get('NomItemMaterialsRecipe'),
      'QuantItemMaterialsRecipe'=> $request->get('QuantItemMaterialsRecipe'),
    ];
    $request->session()->push('ProductMaterialsRecipe',$datos);
  }

  return $request->session()->get('ProductMaterialsRecipe');
}

  //load materilas items
  public function getSessionItemsMaterials(Request $request){
      $idRecipe=$request->get('indexRecipe');
      $arrayDt=$request->session()->get('ProductMaterialsRecipe');
      $datoIM=DB::select('EXEC ASP_RECIPE_MATERIALS ?',array($idRecipe));
      if (!isset($arrayDt)) {
        $request->session()->forget('ProductMaterialsRecipe');
        foreach ($datoIM as $dt) {
          $arratDt=[
            'IdRecipe'=> $idRecipe,
            'IdMaterialsRecipe'=> $dt->ID_MATERIAL,
            'NomItemMaterialsRecipe'=> $dt->NAME_MATERIALS,
            'QuantItemMaterialsRecipe'=> $dt->QUANTITY_RECIPEMAT,
          ];
          $request->session()->push('ProductMaterialsRecipe',$arratDt);
        }
      }
      return $request->session()->get('ProductMaterialsRecipe');

    }

public function setDelMaterialsRecipe(Request $request){
  $IdItemDel=$request->get('IdItemDel');

  $datosTemp=$request->session()->get('ProductMaterialsRecipe');
  $request->session()->forget('ProductMaterialsRecipe');

  foreach ( $datosTemp as $itemsMaterials) {
    if ($itemsMaterials['IdItemMatProd']!=$IdItemDel) {
      $datosOk=[
        'IdItemMatProd'=>$itemsMaterials['IdItemMatProd'],
        'IdRecipe'=> $itemsMaterials['IdRecipe'],
        'IdItemRecipe'=> $itemsMaterials['IdItemRecipe'],
        'IdMaterialsRecipe'=> $itemsMaterials['IdMaterialsRecipe'],
        'NomItemMaterialsRecipe'=> $itemsMaterials['NomItemMaterialsRecipe'],
        'QuantItemMaterialsRecipe'=> $itemsMaterials['QuantItemMaterialsRecipe'],
      ];
      return $request->session()->push('ProductMaterialsRecipe',$datosOk);
    }
  }
}

/*
* ===============================================================================================
                             Metodos Varios
* ===============================================================================================
*/
    //Limpieza de informacion en la session
  private function limpiezaSession(Request $request){
      $request->session()->forget('ProductMaterials');
      $request->session()->forget('ProductRecipe');
      $request->session()->forget('ProductMaterialsRecipe');
      $request->session()->forget('Recipes');
    }

    //carga de tablas parametricas
  private function loadParameter(){
      $datos=[
        'tblMaterialProduct'=>Materials::where('TYPE_MATERIALS', 'pr')->get(),
        'tblMaterialItems'=>Materials::where('TYPE_MATERIALS', 'it')->get(),
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
        return $datos;
    }

    //Validation session
private function getSession($request){
  $this->arrayRecipe = $request->session()->get('Recipes'); //Recetas
  $this->arrayProductRecipe = $request->session()->get('ProductRecipe'); //bonches que forman la receta
  $this->arrayProductMaterialsRecipe=$request->session()->get('ProductMaterialsRecipe');
  $this->arrayProductMaterials= $request->session()->get('ProductMaterials'); //Materiales de la receta
}

  private function ValidationSession($request){
    $correcto=true;

      if (!isset($this->arrayProductMaterials)) {
        //$this->setSessionClear($request);
        $this->errors=['MaterialsRecipe'=>'It has not been entered recipe materials'];
        $correcto=false;

      }

      if (!isset($this->arrayProductRecipe)) {
        //$this->setSessionClear($request);
        $this->errors=['ItemsMaterialsRecipe'=>'It has not been entered recipe ingredients'];
        $correcto=false;
        //return redirect('setInsertProduct')->withErrors($errors);
      }

      if (!isset($this->arrayProductMaterialsRecipe)) {
        //$this->setSessionClear($request);
        $this->errors=['ItemRecipe'=>'It has not been entered materials ingredients'];
        $correcto=false;
        //return redirect('setInsertProduct')->withErrors($errors);
      }
      return $correcto;
    }

  private function setUploadImage($request){
      $file=Input::file('archivo');
      $nombreArchivoRuta='';
      if (isset($file)) {
        $aleatorio=str_random(3);
        $nombreArchivo=$aleatorio."_".$file->getClientOriginalName();
        $nombreArchivoRuta="uploadingFile\\".$nombreArchivo;
        $file->move('uploadingFile',$nombreArchivo);
      }
      return $nombreArchivoRuta;
    }

  //ejecuta procedimientos insert y update
  private function setInsertUpdateItemsMaterials($idUpdateProduct, $request, $sintaxisHeaderRecipe, $sintaxisRecipeItems, $sintaxisMaterialsRecipe, $sintaxisProducts, $sintaxisMaterialProducts){

    //Add recipe head
    $nomArchivoRuta=$this->setUploadImage($request);

    //Add boxes
    $idUsuario=1;
    $idBoxes=$request->get('txtBoxes');

    //Add products
    $idProduct=DB::selectOne($sintaxisProducts,array($idUpdateProduct,trim($request->get('txtPack')),$idBoxes, trim($request->get('txtCodeProduct')), trim($request->get('txtNameProduct')),$nomArchivoRuta, trim($request->get('txtDescription')),trim($request->get('txtCodeUpc')),trim($request->get('txtOnlineName')),$idUsuario));

    $idProduct=$idProduct->ID;

    if (isset($this->arrayRecipe))
    {
      foreach ($this->arrayRecipe as $aPr)
      {
        // Recipe
        $idRecipeUpdate=DB::selectOne('select ID_RECIPE from RECIPES where ID_RECIPE=?',array($aPr['IndexTypeRecipe']));

        $idRecipeUpdate=isset($idRecipeUpdate)?$idRecipeUpdate->ID_RECIPE:0;
        dd($idRecipeUpdate);
        $idRecipe=DB::selectOne($sintaxisHeaderRecipe, array($idRecipeUpdate,$aPr['IndexTypeRecipe']));

        if (isset($idRecipe))
        {
          $idRecipe= $idRecipe->ID_RECIPE;

          $seguir=DB::selectOne('EXEC SP_ADD_PRODUCT_RECIPE ?,?,?',array($idProduct, $idRecipe, $request->get('txtPack')));

          //Add material recipe

          if (isset($this->arrayProductMaterialsRecipe))
          {
            foreach ($this->arrayProductMaterialsRecipe as $prodMatRecipe)
            {
                $seguir=DB::selectOne($sintaxisMaterialsRecipe,array($idRecipe, $prodMatRecipe['IdMaterialsRecipe'],$prodMatRecipe['QuantItemMaterialsRecipe'] ));
            }
          }

          //Add Recipe Product

          if (isset($this->arrayProductRecipe))
          {
            foreach ( $this->arrayProductRecipe as $pr)
            {
              if ($pr['Id_Recipe']==$aPr['IndexTypeRecipe'])  //comparativa receta
              {
                $seguir=DB::selectOne($sintaxisRecipeItems,array($idRecipe,$pr['Quantity'],$pr['IdColor'], $pr['IdCuts'], $pr['IdGrade'], $pr['IdTypes'], $pr['IdProcess'], $pr['IdSpecie'], $pr['IdVariety']));
              }
            }
          }
        }
      }
    }
      //Add materials Product
      if (isset($this->arrayProductMaterials) && $idProduct>0)
      {

        foreach ($this->arrayProductMaterials as $pm)
        {
          //echo $idProduct ." - ". $pm['IdMaterialsProd']." - ". $pm['QuantMaterialsProd'];
            $seguir=DB::selectOne($sintaxisMaterialProducts,array($idProduct,$pm['IdMaterialsProd'], $pm['QuantMaterialsProd']));
        }
        //dd($this->arrayProductMaterials);
      }

      $seguir=DB::selectOne('EXEC SP_HABILITA_PRODUCTO ?',array($idProduct)); //verifica si el producto puede estar activo
  }
}
