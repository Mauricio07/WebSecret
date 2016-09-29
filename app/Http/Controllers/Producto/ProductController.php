<?php

namespace inbloom\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use inbloom\Http\Requests;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Specie;

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
      $vSpecies=\inbloom\Model\Product\Specie::all();
      return view('products.tools',['vSpecies'=>$vSpecies]);
    }
}
