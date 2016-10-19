<?php

namespace inbloom\Http\Controllers\Product;

use Illuminate\Http\Request;
use inbloom\Http\Controllers\Controller;
use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Product\InsertModifyProductRequest;

class ProductController extends Controller
{
    //ingreso de productos
    public function setAddProduct(InsertModifyProductRequest $request){
      dd($request);
      //return redirect('setInsertProduct')->with('message','Save');
    }

}
