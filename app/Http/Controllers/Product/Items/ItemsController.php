<?php

namespace inbloom\Http\Controllers\Product\Items;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Items\InsertModifyItemsRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Item;

class ItemsController extends Controller
{
  //Insert items
  public function setInsertItems(InsertModifyItemsRequest $request){
    $datos=[
      'ID_ITYPES'=>$request->get('txtType'),
      'ID_COLOR'=>$request->get('txtColor'),
      'ID_SPECIE'=>$request->get('txtSpecie'),
      'ID_GRADE'=>$request->get('txtGrade'),
      'ID_Items'=>$request->get('txtItems'),
      'ID_PROCESS'=>$request->get('txtProcess'),
      'DATE_ITEM'=>date('Ymd H:i:s') //fecha sistema
    ];
    Item::create($datos);

    return redirect('vw_Items')->with('message',"Save");
  }

  //modifica item
  public function setModificationItems(InsertModifyItemsRequest $request ){
     Item::where('ID_ITEM', $request->get('txtId'))
        ->update([
          'ID_ITYPES'=>$request->get('txtType'),
          'ID_COLOR'=>$request->get('txtColor'),
          'ID_SPECIE'=>$request->get('txtSpecie'),
          'ID_GRADE'=>$request->get('txtGrade'),
          'ID_Items'=>$request->get('txtItems'),
          'ID_PROCESS'=>$request->get('txtProcess'),
          'MODIFY_ITEM'=>date('Ymd H:i:s') //fecha sistema
        ]);

    return redirect('vw_Items')->with('message',"Edit");

  }

  //eliminar item
  public function getDeleteItems(Request $request){
    $nom=$request->get('txtNameDel');
    $desabilitar=1;
    Item::where('ID_ITEM',$request->get('txtIdDel'))
      ->update([
        'STATE_ITEM'=>$desabilitar,
        'DELETE_ITEM'=>date('Ymd H:i:s') //fecha sistema
      ]);
    return redirect('vw_Items')->with('message',"Deleting ".$nom);
  }
}
