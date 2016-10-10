<?php

namespace inbloom\Http\Controllers\Product\Cut;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Cut\InsertModifyCutRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Cut;

class CutController extends Controller
{
  //ingresa Cut
  public function setInsertCut(InsertModifyCutRequest $request){

    $datos=[
        'NAME_CUT'=>$request->get('txtName'),
        'DATE_CUT'=>date('Ymd H:i:s') //fecha sistema
    ];

    Cut::create($datos);

    return redirect('vw_Cut')->with('message',"Save");
  }

  //modifica Cut
  public function setModificationCut(InsertModifyCutRequest $request ){
    $datos=[
      'idCod'=>$request->get('txtCode'),
      'nameS'=>$request->get('txtName')
    ];

     Cut::where('ID_CUT', $datos['idCod'])
        ->update([
          'NAME_CUT'=>$datos['nameS']
        ]);

    return redirect('vw_Cut')->with('message',"Edit");
  }

  //eliminar Cut
  public function getDeleteCut(Request $request){
    $nom=$request->get('txtNameDel');
    $del=Cut::find($request->get('txtCodeDel'));
    if ($del->delete()){
      return redirect('vw_Cut')->with('message',"Deleting ".$nom);
    }else{
      return redirect('vw_Cut')->with('messageDel',"Error in the Transaction ".$nom);
    }

  }
}
