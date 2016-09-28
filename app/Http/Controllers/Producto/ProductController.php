<?php

namespace inbloom\Http\Controllers\Producto;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Controllers\Controller;

class ProductController extends Controller
{
    //Lista de productos
    public function getListProducts(){
       return view('products.main');
    }

    //ingreso de productos
    public function setInsertProducts(){
      return view('products.insert');
    }

    //
    public function getToolsProducts(){
      return view('products.tools');
    }
}
