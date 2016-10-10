<?php

namespace inbloom\Http\Controllers\Product\Grade;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Grade\InsertModifyGradeRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Grade;

class GradeController extends Controller
{
  //ingresa Grade
  public function setInsertGrade(InsertModifyGradeRequest $request){

    $datos=[
        'NAME_GRADE'=>$request->get('txtName'),
        'DATE_GRADE'=>date('Ymd H:i:s') //fecha sistema
    ];

    Grade::create($datos);

    return redirect('vw_Grade')->with('message',"Save");
  }

  //modifica Grade
  public function setModificationGrade(InsertModifyGradeRequest $request ){
    $datos=[
      'idCod'=>$request->get('txtCode'),
      'nameS'=>$request->get('txtName')
    ];

     Grade::where('ID_GRADE', $datos['idCod'])
        ->update([
          'NAME_GRADE'=>$datos['nameS']
        ]);

    return redirect('vw_Grade')->with('message',"Edit");
  }

  //eliminar Grade
  public function getDeleteGrade(Request $request){
    $nom=$request->get('txtNameDel');
    Grade::destroy($request->get('txtCodeDel'));
    return redirect('vw_Grade')->with('message',"Deleting ".$nom);
  }
}
