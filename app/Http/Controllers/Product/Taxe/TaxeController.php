<?php

namespace inbloom\Http\Controllers\Product\Taxe;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Taxe\InsertModifyTaxeRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Taxe;

class TaxeController extends Controller
{
  //ingreso Taxes
  public function setInsertTaxe(InsertModifyTaxeRequest $request){

    $datos=[
        'COD_TAX'=>$request->get('txtCode'),
        'NAME_TAX'=>$request->get('txtName'),
        'COST_TAX'=>$request->get('txtCost'),
        'DATE_TAX'=>date('Ymd H:i:s') //fecha sistema
    ];

    Taxe::create($datos);

    return redirect('vw_Taxes')->with('message',"Save");
  }

  //modifica Taxes
  public function setModificationTaxe(InsertModifyTaxeRequest $request ){
    $datos=[
      'idCod'=>$request->get('txtId'),
      'Codes'=>$request->get('txtCode'),
      'nameS'=>$request->get('txtName'),
      'costs'=>$request->get('txtCost')
    ];


     Taxe::where('ID_TAX', $datos['idCod'])
        ->update([
          'COD_TAX'=>$datos['Codes'],
          'NAME_TAX'=>$datos['nameS'],
          'COST_TAX'=>$datos['costs']
        ]);

    return redirect('vw_Taxes')->with('message',"Edit");
  }

  //eliminar Taxes
  public function getDeleteTaxe(Request $request){
    $nom=$request->get('txtNameDel');
    Taxe::destroy($request->get('txtIdDel'));
    return redirect('vw_Taxes')->with('message',"Deleting ".$nom);
  }
}
