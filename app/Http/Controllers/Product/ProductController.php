<?php

namespace inbloom\Http\Controllers\Product;

use Illuminate\Http\Request;
use inbloom\Http\Controllers\Controller;
use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Product\InsertModifyProductRequest;

class ProductController extends Controller
{
    //ingreso de productos
    public function setAddProduct(Request $request){

      //Add materials Product
      $idProduct=1;
      foreach ($request->session()->get('ProductMaterials') as $pm) {
        $matProduct=[
          'ID_PRODUCT'=>$idProduct,
          'ID_MATERIAL'=>$pm['NomItemMaterialsProd'],
          'QUANTITY_PRODMAT'=>$pm['QuantItemMaterialsProd'],
          'ID_DIMENSION'=>$pm['DimItemMaterialsProd'],
        ];
      }

      //Add recipe head
      $dataRecipe=[
        'ID_PTYPE'=>$request->session()->get('ProductRecipe')['IdPtype']
      ];
      Recipe::create($dataRecipe);

      $idRecipe=DB::('EXEC SP_ADD_RECIPE_HEADER(?,?)',$dataRecipe);


      //Add Recipe Product
      foreach ($request->session()->get('ProductRecipe') as $pr) {
          DB::selectOne('EXEC SP_ADD_ITEM_RECIPE(?,?,?,?,?,?,?,?)',array($idRecipe,$pr['Quantity'],$pr['IdColor'], $pr['IdColor'], $pr['IdGrade'], $pr['IdTypes'], $pr['IdProcess'], $pr['IdSpecie']));
      }


      //dd($request->session()->get('ProductMaterials'));
      //dd($request->session()->get('ProductRecipe'));
      //save materials
      $datoMat=[
        'NAME_MATERIALS'=>$request->get('txtName'),
        'ABREB_MATERIALS'=>$request->get('txtShortName'),
        'QUANTITY_MATERIALS'=>$request->get('txtName'),
        'DATE_MATERIAL'=>date('Ymd H:i:s'),
      ];

      //dd($valItems);
      //return redirect('setInsertProduct')->with('message','Save');
    }

    public function setAddInsertMaterial(Request $request){

      //$request->session()->set('ItemsMaterialsProduct',$data);

      return response()->json('itemMenssage','adicionado');

    }

}
