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
    //ingreso de productos
    public function setAddProduct(InsertModifyProductRequest $request){
      //Add recipe head

      $file=Input::file('archivo');
      $aleatorio=str_random(3);
      $nombreArchivo=$aleatorio."-".$file->getClientOriginalName();
      $nombreArchivoRuta="uploadingFile\\".$nombreArchivo;
      $file->move('uploadingFile',$nombreArchivo);

      $arrayRecipe = $request->session()->get('Recipes'); //Recetas
      $arrayProductRecipe = $request->session()->get('ProductRecipe'); //bonches que forman la receta
      $arrayProductMaterialsRecipe=$request->session()->get('ProductItemsMaterialsRecipe');
      $arrayProductMaterials= $request->session()->get('ProductMaterials'); //Materiales de la receta

      //Validation Session
      if (!isset($arrayProductMaterials)) {
        $this->setSessionClear($request);
        $errors=['MaterialsRecipe'=>'It has not been entered recipe materials'];
        return redirect('setInsertProduct')->withErrors($errors);
      }

      if (!isset($arrayProductRecipe)) {
        $this->setSessionClear($request);
        $errors=['ItemsMaterialsRecipe'=>'It has not been entered recipe ingredients'];
        return redirect('setInsertProduct')->withErrors($errors);
      }

      if (!isset($arrayProductMaterialsRecipe)) {
        $this->setSessionClear($request);
        $errors=['ItemRecipe'=>'It has not been entered materials ingredients'];
        return redirect('setInsertProduct')->withErrors($errors);
      }
      //dd($arrayRecipe);
      foreach ($arrayRecipe as $aPr) {
        // Recipe
        $idRecipe=DB::selectOne('EXEC SP_ADD_RECIPE_HEADER ?', array($aPr['IndexTypeRecipe']));

        if (isset($idRecipe))
        {
          $idRecipe= $idRecipe->ID_RECIPE;

          //Add Recipe Product

          foreach ( $arrayProductRecipe as $pr) {
            if ($pr['Id_Recipe']==$aPr['IndexRecipe'])  //comparativa receta
            {
              $datoIndex=DB::selectOne('EXEC SP_ADD_ITEM_RECIPE ?,?,?,?,?,?,?,?,?',array($idRecipe,$pr['Quantity'],$pr['IdColor'], $pr['IdCuts'], $pr['IdGrade'], $pr['IdTypes'], $pr['IdProcess'], $pr['IdSpecie'], $pr['IdVariety']));

                //Add material recipe items
                if (isset($arrayProductMaterialsRecipe))
                {

                  foreach ($arrayProductMaterialsRecipe as $prodMatRecipe)
                  {
                    if (($prodMatRecipe['IdRecipe']==$pr['Id_Recipe'])&&($prodMatRecipe['IdItemRecipe'])==$pr['IdItemRecipeProd'])
                    {
                      $seguir=DB::select('EXEC SP_ADD_MATERIAL_RECIPE_ITEMS ?,?,?,?',array($idRecipe, $datoIndex ->INDEX, $prodMatRecipe['IdMaterialsRecipe'],$prodMatRecipe['QuantItemMaterialsRecipe'] ));
                    }
                  }
                }
            }
          }
        }


        //Add boxes
        $idUsuario=1;
        $idBoxes=$request->get('txtBoxes');

        //Add products
        $idProduct=DB::selectOne('EXEC SP_ADD_PRODUCTS ?,?,?,?,?,?,?,?,?,? ',array($idRecipe, $request->get('txtPack'),$idBoxes, $request->get('txtCodeProduct'), $request->get('txtNameProduct'),$nombreArchivoRuta, $request->get('txtDescription'),$request->get('txtCodeUpc'),$request->get('txtOnlineName'),$idUsuario));

        $idProduct=$idProduct->ID;

        //Add materials Product
        if ($idProduct>0)
        {
          foreach ($arrayProductMaterials as $pm) {
              $seguir=DB::select('EXEC SP_ADD_MATERIALS_PRODUCT ?,?,? ',array($idProduct,$pm['IdMaterialsProd'], $pm['QuantMaterialsProd']));
          }
        }

        return redirect('vw_product')->with('message','Save');
      }
    }

    public function setInsertProduct(InsertModifyProductRequest $request){
      $this->limpiezaSession($request);
      $datos=$this->loadParameter();
      return view('products.insert',['post'=>'true', 'tittle'=>"Product",'datos'=>$datos]);
    }

    public function getDeleteProduct(Request $request){
      Product::where('ID_PRODUCT', $request->get('txtCodeDel'))
          ->update([
            'DATEDELETE_PRODUCT'=>date('Ymd H:i:s'),
            'STATUS_PRODUCT'=>'0'
          ]);
      return redirect('vw_product')->with('message','Delete');
    }

    public function getEditProduct(InsertModifyProductRequest $request){
      $this->limpiezaSession($request);

      $idProduct=$request->get('txtCodeEdit');

      $datos=$this->loadParameter();
      $dtInformacion=[
        'infoProducto'=>DB::selectOne('EXEC ASP_HEADER_PRODUCTS ?',array($idProduct)),
      ];
      //dd($dtInformacion);
      return view('products.edit',['post'=>'true','tittle'=>'Edit Products','datos'=>$datos, 'dtInformacion'=>$dtInformacion]);
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
        'QuantityRecipe'=>$request->get('QuantityRecipe'),
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
              'QuantityRecipe'=>$dt['QuantityRecipe'],
            ];
            $request->session()->push('Recipes',$arrayDatosOk);
          }
        }
    }
  }

    //load Recipes
    public function loadRecipes(Request $request){
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
            'QuantityRecipe'=>$dt->QUANTITY_RECIPEITEM,
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
    public function loadItemRecipe(Request $request){
      $idRecipe=$request->get('idRecipe');
      $idProduct=$request->get('idProduct');

      $arrayDt=$request->session()->get('ProductRecipe');
      if (!isset($arrayDt)) {
        $request->session()->forget('ProductRecipe');
        $arrayDt=[];
        $datoI=DB::select('EXEC ASP_RECIPES_ITEMS ?,?',array($idProduct, $idRecipe));
        foreach ($datoI as $dt) {
          $arrayDt=[
          'Id_Recipe'=>$idRecipe,
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

  $idItemRecipe=$request->get('idBusca');

  $dt=$request->session()->get('ProductRecipe');

  if (isset($dt)) {
    foreach ($dt as $recipeItems) {
      if ($recipeItems['Id_Recipe']==$idItemRecipe) {
        $datos=DB::select('EXEC ASP_ITEMS_RECIPE ?,?,?,?,?,?,?,?,?,?',array($recipeItems['IdSpecie'], $recipeItems['IdColor'],$recipeItems['IdProcess'],$recipeItems['IdTypes'],$recipeItems['IdCuts'],$recipeItems['IdGrade'],$recipeItems['IdVariety'],$recipeItems['Quantity'], $recipeItems['IdItemRecipeProd'], $recipeItems['Id_Recipe']));
        //array_push($datosRecipe,$datos);
        $request->session()->push('ReporteProductRecipe',$datos);
      }
    }
  }

  return $request->session()->get('ReporteProductRecipe');

}

    //load materilas items
    public function loadItemsMaterials(Request $request){
      $idRecipe=$request->get('indexRecipe');
      $idItems=$request->get('indexItem');
      $arrayDt=$request->session()->get('ProductItemsMaterialsRecipe');
      $datoIM=DB::select('EXEC ASP_ITEMS_MATERIALS ?,?',array($idRecipe, $idItems));
      if (!isset($arrayDt)) {
        $request->session()->forget('ProductItemsMaterialsRecipe');
        foreach ($datoIM as $dt) {
          $arratDt=[
            'IdItemMatProd'=>$dt->ID_INDEXRI,
            'IdRecipe'=> $idRecipe,
            'IdItemRecipe'=> $idItems,
            'IdMaterialsRecipe'=> $dt->ID_MATERIAL,
            'NomItemMaterialsRecipe'=> $dt->NAME_MATERIALS,
            'QuantItemMaterialsRecipe'=> $dt->QUANTITY_RECIPEMAT,
          ];
          $request->session()->push('ProductItemsMaterialsRecipe',$arratDt);
        }
      }
      return $request->session()->get('ProductItemsMaterialsRecipe');

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
      $request->session()->forget('ProductItemsMaterialsRecipe');
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

}
