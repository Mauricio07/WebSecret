<?php

namespace inbloom\Http\Controllers\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use inbloom\Http\Controllers\Controller;
use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Product\InsertModifyProductRequest;
use Validator;

class ProductController extends Controller
{
    //ingreso de productos
    public function setAddProduct(InsertModifyProductRequest $request){
      //Add recipe head

      dd($request->session()->get('ProductMaterials'));

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

        if (isset($idRecipe)) {
          $idRecipe= $idRecipe->ID_RECIPE;

          //Add Recipe Product

          foreach ( $arrayProductRecipe as $pr) {
            if ($pr['Id_Recipe']==$idRecipe) { //comparativa receta
              $datoIndex=DB::select('EXEC SP_ADD_ITEM_RECIPE ?,?,?,?,?,?,?,?,?',array($idRecipe,$pr['Quantity'],$pr['IdColor'], $pr['IdCuts'], $pr['IdGrade'], $pr['IdTypes'], $pr['IdProcess'], $pr['IdSpecie'], $pr['IdVariety']));

                //Add material recipe items
                if (isset($arrayProductMaterialsRecipe))
                {

                  foreach ($arrayProductMaterialsRecipe as $prodMatRecipe) {
                    if (($prodMatRecipe['IdRecipe']==$pr['Id_Recipe'])&&($prodMatRecipe['IdItemRecipe'])==$pr['IdItemRecipeProd']) {
                      $seguir=DB::select('EXEC SP_ADD_MATERIAL_RECIPE ?,?,?,?',array($idRecipe, $prodMatRecipe['IdMaterialsRecipe'], $datoIndex->INDEX ,$prodMatRecipe['QuantItemMaterialsRecipe'] ));
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
        if ($idProduct>0){
          foreach ($arrayProductMaterials as $pm) {
              $seguir=DB::select('EXEC SP_ADD_MATERIALS_PRODUCT ?,?,? ',array($idProduct,$pm['NomItemMaterialsProd'], $pm['QuantItemMaterialsProd']));
          }
        }

        return redirect('setInsertProduct')->with('message','Save');

      }

    }

    public function uploading(){

      $file=Input::file('archivo');
      $aleatorio=str_random(3);

      $nombre=$aleatorio."-".$file->getClientOriginalName();
      $file->move('uploadingFile',$nombre);

      return 'ok';
    }

    public function setSessionClear(InsertModifyProductRequest $request){
      $request->session()->forget('ProductMaterials');
      $request->session()->forget('ProductRecipe');
      $request->session()->forget('ProductMaterialsRecipe');
    }
}
