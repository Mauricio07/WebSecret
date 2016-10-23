<?php

namespace inbloom\Http\Controllers\Product\Material;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Material\MaterialRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Materials;

class MaterialController extends Controller
{
    //insert
    public function setInsertMaterial(MaterialRequest $request){
      $datos=[
        'NAME_MATERIALS'=>$request->get('txtName'),
        'ABREB_MATERIALS'=>$request->get('txtShortName'),
        'TYPE_MATERIALS'=>$request->get('txtTypeMat'),
        'DATE_MATERIAL'=>date('Ymd H:i:s'),
        'STATE_MATERIAL'=>1, //materials enable
      ];

      Materials::create($datos);
      return redirect('vw_material')->with('message','Save');
    }

    public function setModificationMaterial(MaterialRequest $request){
      Materials::where('ID_MATERIAL', $request->get('txtCode'))
              ->update([
                'NAME_MATERIALS'=>$request->get('txtName'),
                'ABREB_MATERIALS'=>$request->get('txtShortName'),
                'TYPE_MATERIALS'=>$request->get('txtTypeMat'),
                'MODIFY_MATERIAL'=>date('Ymd H:i:s'),
              ]);
      return redirect('vw_material')->with('message', 'Edit');
    }

    public function getDeleteMaterial(Request $request){
        Materials::where('ID_MATERIAL', $request->get('txtCodeDel'))
          ->update([
            'STATE_MATERIAL'=>0,
            'DELETE_MATERIAL'=>date('Ymd H:i:s'),
          ]);
          return redirect('vw_material')->with('message', 'Delete');
    }
}
