<?php

namespace inbloom\Http\Controllers\Product\Variety;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Variety\InsertModifyVarietyRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Variety;

class VarietyController extends Controller
{
  //ingresa Variety types
  public function setInsertVariety(InsertModifyVarietyRequest $request){

    $datos=[
        'NAME_VARIETY'=>$request->get('txtName'),
        'DATE_VARIETY'=>date('Ymd H:i:s') //fecha sistema
    ];

    Variety::create($datos);

    return redirect('vw_Variety')->with('message',"Save");
  }

  //modifica Variety types
  public function setModificationVariety(InsertModifyVarietyRequest $request ){
    $datos=[
      'idCod'=>$request->get('txtCode'),
      'nameS'=>$request->get('txtName')
    ];

     Variety::where('ID_VARIETY', $datos['idCod'])
        ->update([
          'NAME_VARIETY'=>$datos['nameS']
        ]);

    return redirect('vw_Variety')->with('message',"Edit");
  }

  //eliminar Variety types
  public function getDeleteVariety(Request $request){
    $nom=$request->get('txtNameDel');
    Variety::destroy($request->get('txtCodeDel'));
    return redirect('vw_Variety')->with('message',"Deleting ".$nom);
  }

}
