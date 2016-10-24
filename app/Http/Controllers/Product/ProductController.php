<?php

namespace inbloom\Http\Controllers\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use inbloom\Http\Controllers\Controller;
use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Product\InsertModifyProductRequest;

class ProductController extends Controller
{
    //ingreso de productos
    public function setAddProduct(Request $request){

      //Add recipe head
      $idRecipe=DB::selectOne('EXEC SP_ADD_RECIPE_HEADER ?', array($request->get('txtPresentation')));

      if (isset($idRecipe)) {
        $idRecipe= $idRecipe->ID_RECIPE;

        //Add Recipe Product
        foreach ($request->session()->get('ProductRecipe') as $pr) {
            $seguir=DB::select('EXEC SP_ADD_ITEM_RECIPE ?,?,?,?,?,?,?,?',array($idRecipe,$pr['Quantity'],$pr['IdColor'], $pr['IdColor'], $pr['IdGrade'], $pr['IdTypes'], $pr['IdProcess'], $pr['IdSpecie']));
        }

        //Add recipe materials

        foreach ($request->session()->get('ProductMaterialsRecipe') as $prodMatRecipe) {
          $seguir=DB::select('EXEC SP_ADD_MATERIAL_RECIPE ?,?,?',array($idRecipe, $prodMatRecipe['NomItemMaterialsProd'], $prodMatRecipe['QuantItemMaterialsProd'] ));
        }

        //Add boxes
        $idBoxes=$request->get('txtBoxes');

        //Add products
        $idProduct=DB::selectOne('EXEC SP_ADD_PRODUCTS ?,?,?,?,?,?,?,?,? ',array($idRecipe, $request->get('txtPack'),$idBoxes, $request->get('txtCodeProduct'), $request->get('txtNameProduct'),$request->get('txtPathProduct'), $request->get('txtDescription'),$request->get('txtCodeUpc'),$request->get('txtOnlineName')));

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

}
