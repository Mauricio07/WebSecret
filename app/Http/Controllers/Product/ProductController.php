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

      //materiales
      dd($request->session()->get('ItemsMaterialsProduct'));
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
