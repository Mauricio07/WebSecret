<?php

namespace inbloom\Http\Controllers\Product\Boxes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use inbloom\Http\Requests;
use inbloom\Http\Controllers\Controller;

class BoxesController extends Controller
{
    public function setAddBoxes(Request $request){
      $datos=[
        $request->get('txtType'),
        $request->get('txtName'),
        $request->get('txtAcronym'),
        $request->get('txtLength'),
        $request->get('txtWidth'),
        $request->get('txtHeight'),
        $request->get('txtWeigth'),
      ];

      $info=DB::select('EXEC SP_ADD_TYPEBOXES ?, ?, ?, ?, ?, ?, ?',$datos);

      return redirect('vw_boxes')->with('message','Save');
    }
}
