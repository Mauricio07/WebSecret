<?php

namespace inbloom\Http\Controllers\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use inbloom\Http\Controllers\Controller;
use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Product\InsertModifyProductRequest;

class ProductController extends Controller
{
    //ingreso de productos
    public function setAddProduct(Request $request){
      //Add recipe head
      $file=Input::file('archivo');
      $aleatorio=str_random(3);
      $nombreArchivo=$aleatorio."-".$file->getClientOriginalName();
      $nombreArchivoRuta="uploadingFile\\".$nombreArchivo;
      $file->move('uploadingFile',$nombreArchivo);

      $idRecipe=DB::selectOne('EXEC SP_ADD_RECIPE_HEADER ?', array($request->get('txtPresentation')));

      if (isset($idRecipe)) {
        $idRecipe= $idRecipe->ID_RECIPE;

        //Add Recipe Product
        $arrayProductRecipe = $request->session()->get('ProductRecipe');
        $arrayProductMaterialsRecipe=$request->session()->get('ProductMaterialsRecipe');
        $arrayProductMaterials= $request->session()->get('ProductMaterials');

        foreach ( $arrayProductRecipe as $pr) {

              $datoIndex=DB::select('EXEC SP_ADD_ITEM_RECIPE ?,?,?,?,?,?,?,?',array($idRecipe,$pr['Quantity'],$pr['IdColor'], $pr['IdColor'], $pr['IdGrade'], $pr['IdTypes'], $pr['IdProcess'], $pr['IdSpecie']));

              //Add material recipe items
              if (isset($arrayprodMaterial))
              {
                foreach ($arrayprodMaterial as $prodMatRecipe) {
                  if ($datoIndex->INDEX == $prodMatRecipe['IdItemRecipe']) {
                    $seguir=DB::select('EXEC SP_ADD_MATERIAL_RECIPE ?,?,?',array($idRecipe, $prodMatRecipe['IdMaterialsRecipe'], $prodMatRecipe['QuantItemMaterialsRecipe'] ));
                  }
                }
            }
        }

        //Add boxes
        $idBoxes=$request->get('txtBoxes');

        //Add products
        $idProduct=DB::selectOne('EXEC SP_ADD_PRODUCTS ?,?,?,?,?,?,?,?,? ',array($idRecipe, $request->get('txtPack'),$idBoxes, $request->get('txtCodeProduct'), $request->get('txtNameProduct'),$nombreArchivoRuta, $request->get('txtDescription'),$request->get('txtCodeUpc'),$request->get('txtOnlineName')));

        $idProduct=$idProduct->ID;

        //Add materials Product
        if ($idProduct>0){
          foreach ($request->session()->get('ProductMaterials') as $pm) {
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
}
