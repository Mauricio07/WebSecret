<?php

namespace inbloom\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use inbloom\Http\Requests;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Specie;

class ProductController extends Controller
{
    //Lista de productos
    public function getListProducts(){
       return view('products.main');
    }

    //ingreso de productos
    public function setInsertProducts(){
      return view('products.insert');
    }

    //
    public function getToolsProducts(){
      $vSpecies=Specie::get();
      return view('products.tools',['vSpecies'=>$vSpecies]);
    }

    //ingresa Specie
    public function setInsertSpecie(Request $request){

      $datos=[
          'name_specie'=>$request->get('nameSpecie'),
          'date_specie'=>date('Ymd H:i:s') //fecha sistema
      ];

      Specie::create($datos);

      return $this->getSpecie('Sucess Save');
    }

      //modifica Specie
      public function setModificationSpecies(Request $request ){
        $datos=[
          'idCod'=>$request->get('idcodMod'),
          'nameS'=>$request->get('nameSpecie')
        ];

         Specie::where('id_specie', $datos['idCod'])
            ->update([
              'name_specie'=>$datos['nameS']
            ]);

        return $this->getSpecie('Sucess modification');
      }

      //eliminar Specie
      public function getDeleteSpecies($ID_SPECIE){
        Specie::destroy($ID_SPECIE);
        return $this->getSpecie('Sucess deleting');
      }

      private function getSpecie($mensaje){
        $vSpecies=Specie::get();
        return redirect('getToolsProduct')->with('message',$mensaje);
      }

}
