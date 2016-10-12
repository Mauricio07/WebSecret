<?php

namespace inbloom\Http\Controllers\Product;

use Illuminate\Http\Request;
use inbloom\Http\Controllers\Controller;
use inbloom\Http\Requests;

class ProductController extends Controller
{
    //ingreso de productos
    public function setInsertProducts(){
      return redirect('vw_material');
    }

}
