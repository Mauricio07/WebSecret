<?php

namespace inbloom\Http\Controllers\Product\BoxeType;

use Illuminate\Http\Request;
use inbloom\Http\Requests\Product\Boxe\InsertModifyBoxeTypeRequest;
use inbloom\Http\Requests;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Boxe_type;

class BoxTypeController extends Controller
{
    public function setInsertBoxType(InsertModifyBoxeTypeRequest $request){
      $datos=[
        'TYPEBOXE_BTYPE'=>$request->get('txtName'),
        'DATECREATE_BTYPE'=>date('Ymd H:i:s') //fecha sistema
      ];
      Boxe_type::create($datos);
      return redirect('vw_BoxeTypes')->with('message',"Save");
    }

    //modifica Color
    public function setModificationBoxType(InsertModifyBoxeTypeRequest $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Boxe_type::where('ID_BTYPE', $datos['idCod'])
          ->update([
            'TYPEBOXE_BTYPE'=>$datos['nameS']
          ]);
      return redirect('vw_BoxeTypes')->with('message',"Edit");
    }

    //eliminar Color
    public function getDeleteBoxType(Request $request){
      $nom=$request->get('txtNameDel');
      Boxe_type::destroy($request->get('txtCodeDel'));
      return redirect('vw_BoxeTypes')->with('message',"Deleted");
    }

}
