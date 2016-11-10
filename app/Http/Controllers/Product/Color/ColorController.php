<?php

namespace inbloom\Http\Controllers\Product\Color;

use Illuminate\Http\Request;

use inbloom\Http\Requests;
use inbloom\Http\Requests\Product\Color\InsertModifyColorRequest;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Color;
use Validator;

class ColorController extends Controller
{
      //ingresa Color
      public function setInsertColor(InsertModifyColorRequest $request){
        $datos=[
            'NAME_COLOR'=>$request->get('txtName'),
            'DATE_COLOR'=>date('Ymd H:i:s') //fecha sistema
        ];

        Color::create($datos);
        return redirect('vw_Color')->with('message',"Save");
      }

      //modifica Color
      public function setModificationColor(InsertModifyColorRequest $request ){
        $datos=[
          'idCod'=>$request->get('txtCode'),
          'nameS'=>$request->get('txtName')
        ];

         Color::where('ID_COLOR', $datos['idCod'])
            ->update([
              'NAME_COLOR'=>$datos['nameS']
            ]);
        return redirect('vw_Color')->with('message',"Edit");
      }

      //eliminar Color
      public function getDeleteColor(Request $request){
        $nom=$request->get('txtNameDel');
        Color::destroy($request->get('txtCodeDel'));
        return redirect('vw_Color')->with('message',"Deleted");
      }

}
