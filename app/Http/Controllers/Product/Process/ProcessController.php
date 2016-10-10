<?php

namespace inbloom\Http\Controllers\Product\Process;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Process\InsertModifyProcessRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Process;

class ProcessController extends Controller
{
  //ingresa Process
  public function setInsertProcess(InsertModifyProcessRequest $request){

    $datos=[
        'TYPE_PROCESS'=>$request->get('txtName'),
        'DATE_PROCESS'=>date('Ymd H:i:s') //fecha sistema
    ];

    Process::create($datos);

    return redirect('vw_Process')->with('message',"Save");
  }

  //modifica Process
  public function setModificationProcess(InsertModifyProcessRequest $request ){
    $datos=[
      'idCod'=>$request->get('txtCode'),
      'nameS'=>$request->get('txtName')
    ];

     Process::where('ID_PROCESS', $datos['idCod'])
        ->update([
          'TYPE_PROCESS'=>$datos['nameS']
        ]);

    return redirect('vw_Process')->with('message',"Edit");
  }

  //eliminar Process
  public function getDeleteProcess(Request $request){
    $nom=$request->get('txtNameDel');
    Process::destroy($request->get('txtCodeDel'));
    return redirect('vw_Process')->with('message',"Deleting ".$nom);
  }
}
