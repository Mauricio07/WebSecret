<?php

namespace inbloom\Http\Controllers\Product\Material;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Material\MaterialRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Material;

class MaterialController extends Controller
{
    //insert
    public function setInsertMaterial(MaterialRequest $request){
      $datos=[
        'NAME_MATERIALS'=>$request->get('txtName'),
        'ABREB_MATERIALS'=>$request->get('txtShortName'),
        'QUANTITY_MATERIALS'=>$request->get('txtName'),
        'DATE_MATERIAL'=>date('Ymd H:i:s'),
      ];

      Material::create($datos);
      return view('vw_material')->with('messsage','Save');
    }

    public function setModificationMaterial(MaterialRequest $request){
      Material::where('ID_MATERIAL', $request->get('txtCode'))
              ->update([
                'NAME_MATERIALS'=>$request->get('txtName'),
                'ABREB_MATERIALS'=>$request->get('txtShortName'),
                'QUANTITY_MATERIALS'=>$request->get('txtName'),
                'MODIFY_MATERIAL'=>date('Ymd H:i:s'),
              ]);
      return view('vw_material')->->with('message', 'Edit')
    }

    public function setRegistrosDel(Request $request){
        Material::where('ID_MATERIAL', $request->get('txtCode'))
          ->update([
            'STATE_MATERIAL'=>'0',
            'DELETE_MATERIAL'=>date('Ymd H:i:s'),
          ]);
          return view('vw_material')->->with('message', 'Delete')
    }
}
