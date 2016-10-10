<?php

namespace inbloom\Http\Controllers\Product\ItemType;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\ItemType\InsertModifyItemTypeRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Items_type;

class ItemTypeController extends Controller
{
    //ingreso item types
    public function setInsertItemTypes(InsertModifyItemTypeRequest $request){

      $datos=[
          'NAME_ITYPES'=>$request->get('txtName'),
          'DATE_ITYPES'=>date('Ymd H:i:s') //fecha sistema
      ];

      Items_type::create($datos);

      return redirect('vw_ItemTypes')->with('message',"Save");
    }

    //modifica item types
    public function setModificationItemType(InsertModifyItemTypeRequest $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Items_type::where('ID_ITYPES', $datos['idCod'])
          ->update([
            'NAME_ITYPES'=>$datos['nameS']
          ]);

      return redirect('vw_ItemTypes')->with('message',"Edit");
    }

    //eliminar item types
    public function getDeleteItemsTypes(Request $request){
      $nom=$request->get('txtNameDel');
      Items_type::destroy($request->get('txtCodeDel'));
      return redirect('vw_ItemTypes')->with('message',"Deleting ".$nom);
    }

}
