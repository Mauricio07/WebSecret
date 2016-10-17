<?php

namespace inbloom\Http\Controllers\Product\Presentation;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Presentation\InsertModifyPresentationRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Presentation;

class PresentationController extends Controller
{
  //ingresa Presentation
  public function setInsertPresentation(InsertModifyPresentationRequest $request){

    $datos=[
        'NAME_PTYPE'=>$request->get('txtName'),
        'DATE_PTYPE'=>date('Ymd H:i:s') //fecha sistema
    ];

    Presentation::create($datos);

    return redirect('vw_Presentation')->with('message',"Save");
  }

  //modifica Presentation
  public function setModificationPresentation(InsertModifyPresentationRequest $request ){
    $datos=[
      'idCod'=>$request->get('txtCode'),
      'nameS'=>$request->get('txtName')
    ];

     Presentation::where('ID_PTYPE', $datos['idCod'])
        ->update([
          'NAME_PTYPE'=>$datos['nameS']
        ]);

    return redirect('vw_Presentation')->with('message',"Edit");
  }

  //eliminar Presentation
  public function getDeletePresentation(Request $request){
    $nom=$request->get('txtNameDel');
    Presentation::destroy($request->get('txtCodeDel'));
    return redirect('vw_Presentation')->with('message',"Deleting ".$nom);
  }
}
