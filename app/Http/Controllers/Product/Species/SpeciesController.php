<?php

namespace inbloom\Http\Controllers\Product\Species;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Species\InsertModifySpeciesRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Specie;

class SpeciesController extends Controller
{
  //ingresa Specie
  public function setInsertSpecies(InsertModifySpeciesRequest $request){
  $datos=[
      'NAME_SPECIE'=>$request->get('txtName'),
      'ID_VARIETY'=>$request->get('txtVariety'),
      'ID_TAX'=>$request->get('txtTaxe'),
      'DATE_SPECIE'=>date('Ymd H:i:s') //fecha sistema
  ];

  Specie::create($datos);
  return redirect('vw_Specie')->with('message',"Save");
  }

  //modifica Specie
  public function setModificationSpecies(InsertModifySpeciesRequest $request ){
     Specie::where('id_specie', $request->get('txtCode'))
        ->update([
              'NAME_SPECIE'=>$request->get('txtName'),
              'ID_VARIETY'=>$request->get('txtVariety'),
              'ID_TAX'=>$request->get('txtTaxe'),
        ]);

    return redirect('vw_Specie')->with('message',"Edit");
  }

  //eliminar Specie
  public function getDeleteSpecies(Request $request){
    $nom=$request->get('txtNameDel');
    Specie::destroy($request->get('txtCodeDel'));
    return redirect('vw_Specie')->with('message',"Deleting ".$nom);
  }
}
