<?php

namespace inbloom\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use inbloom\Http\Requests;
use inbloom\Http\Controllers\Controller;
use inbloom\Model\Product\Specie;
use inbloom\Model\Product\Items_type;
use inbloom\Model\Product\Presentation;
use inbloom\Model\Product\Process;
use inbloom\Model\Product\Variety;
use inbloom\Model\Product\Color;
use inbloom\Model\Product\Grade;
use inbloom\Model\Product\Cut;

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
      $vDatos=[
          'tblSpecie'=>Specie::get(),
          'tblItemType'=>Items_type::get(),
          'tblPresentation'=>Presentation::get(),
          'tblProcess'=>Process::get(),
          'tblVariety'=>Variety::get(),
          'tblColor'=>Color::get(),
          'tblGrade'=>Grade::get(),
          'tblCut'=>Cut::get(),
        ];
      //return view('products.tools',['vDatosTbl'=>$vDatos]);
      return view('products.taxe');
    }

    private function getTools($mensaje){
      return redirect('getToolsProduct')->with('message',$mensaje);
    }

    //ingresa Specie
    public function setInsertSpecie(Request $request){
    $datos=[
        'name_specie'=>$request->get('nameSpecie'),
        'date_specie'=>date('Ymd H:i:s') //fecha sistema
    ];

    Specie::create($datos);

    return $this->getTools('Save');
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

      return $this->getTools('modification');
    }

    //eliminar Specie
    public function getDeleteSpecies($ID_SPECIE){
      Specie::destroy($ID_SPECIE);
      return $this->getTools('deleting');
    }

    //ingresa item types
    public function setInsertItemTypes(Request $request){

      $datos=[
          'NAME_ITYPES'=>$request->get('nameItemType'),
          'DATE_ITYPES'=>date('Ymd H:i:s') //fecha sistema
      ];

      Items_type::create($datos);

      return $this->getTools('Save');
    }

    //modifica item types
    public function setModificationItemType(Request $request ){
      $datos=[
        'idCod'=>$request->get('idcodModItemTypes'),
        'nameS'=>$request->get('nameItemTypes')
      ];

       Items_type::where('ID_ITYPES', $datos['idCod'])
          ->update([
            'NAME_ITYPES'=>$datos['nameS']
          ]);

      return $this->getTools('modification');
    }

    //eliminar item types
    public function getDeleteItemsTypes($ID_ITYPES){
      Items_type::destroy($ID_ITYPES);
      return $this->getTools('deleting');
    }

    //ingresa Product types
    public function setInsertPresentation(Request $request){

      $datos=[
          'NAME_PTYPE'=>$request->get('namePresentation'),
          'DATE_PTYPE'=>date('Ymd H:i:s') //fecha sistema
      ];

      Presentation::create($datos);

      return $this->getTools('Save');
    }

    //modifica Product types
    public function setModificationPresentation(Request $request ){
      $datos=[
        'idCod'=>$request->get('idcodPresentation'),
        'nameS'=>$request->get('namePresentation')
      ];

       Presentation::where('ID_PTYPE', $datos['idCod'])
          ->update([
            'NAME_PTYPE'=>$datos['nameS']
          ]);

      return $this->getTools('modification');
    }

    //eliminar Product types
    public function getDeletePresentation($ID_PTYPE){
      Presentation::destroy($ID_PTYPE);
      return $this->getTools('deleting');
    }

    //ingresa Process types
    public function setInsertProcess(Request $request){

      $datos=[
          'TYPE_PROCESS'=>$request->get('nameProcess'),
          'DATE_PROCESS'=>date('Ymd H:i:s') //fecha sistema
      ];

      Process::create($datos);

      return $this->getTools('Save');
    }

    //modifica Process types
    public function setModificationProcess(Request $request ){
      $datos=[
        'idCod'=>$request->get('idcodProcess'),
        'nameS'=>$request->get('nameProcess')
      ];

       Process::where('ID_PROCESS', $datos['idCod'])
          ->update([
            'TYPE_PROCESS'=>$datos['nameS']
          ]);

      return $this->getTools('modification');
    }

    //eliminar Process types
    public function getDeleteProcess($ID_PROCESS){
      Process::destroy($ID_PROCESS);
      return $this->getTools('deleting');
    }

    //ingresa Variety types
    public function setInsertVariety(Request $request){

      $datos=[
          'NAME_VARIETY'=>$request->get('nameVariety'),
          'DATE_VARIETY'=>date('Ymd H:i:s') //fecha sistema
      ];

      Variety::create($datos);

      return $this->getTools('Save');
    }

    //modifica Variety types
    public function setModificationVariety(Request $request ){
      $datos=[
        'idCod'=>$request->get('idcodVariety'),
        'nameS'=>$request->get('nameVariety')
      ];

       Variety::where('ID_VARIETY', $datos['idCod'])
          ->update([
            'NAME_VARIETY'=>$datos['nameS']
          ]);

      return $this->getTools('modification');
    }

    //eliminar Variety types
    public function getDeleteVariety($ID_VARIETY){
      Variety::destroy($ID_VARIETY);
      return $this->getTools('deleting');
    }

    //ingresa Color types
    public function setInsertColor(Request $request){

      $datos=[
          'NAME_COLOR'=>$request->get('nameColor'),
          'DATE_COLOR'=>date('Ymd H:i:s') //fecha sistema
      ];

      Color::create($datos);

      return $this->getTools('Save');
    }

    //modifica Color types
    public function setModificationColor(Request $request ){
      $datos=[
        'idCod'=>$request->get('idcodColor'),
        'nameS'=>$request->get('nameColor')
      ];

       Color::where('ID_COLOR', $datos['idCod'])
          ->update([
            'NAME_COLOR'=>$datos['nameS']
          ]);

      return $this->getTools('modification');
    }

    //eliminar Color types
    public function getDeleteColor($ID_COLOR){
      Color::destroy($ID_COLOR);
      return $this->getTools('deleting');
    }

    //ingresa Grade types
    public function setInsertGrade(Request $request){

      $datos=[
          'NAME_GRADE'=>$request->get('nameGrade'),
          'DATE_GRADE'=>date('Ymd H:i:s') //fecha sistema
      ];

      Grade::create($datos);

      return $this->getTools('Save');
    }

    //modifica Grade types
    public function setModificationGrade(Request $request ){
      $datos=[
        'idCod'=>$request->get('idcodGrade'),
        'nameS'=>$request->get('nameGrade')
      ];

       Grade::where('ID_GRADE', $datos['idCod'])
          ->update([
            'NAME_GRADE'=>$datos['nameS']
          ]);

      return $this->getTools('modification');
    }

    //eliminar Grade types
    public function getDeleteGrade($ID_GRADE){
      Grade::destroy($ID_GRADE);
      return $this->getTools('deleting');
    }

    //ingresa Cut types
    public function setInsertCut(Request $request){

      $datos=[
          'NAME_CUT'=>$request->get('nameCut'),
          'DATE_CUT'=>date('Ymd H:i:s') //fecha sistema
      ];

      Cut::create($datos);

      return $this->getTools('Save');
    }

    //modifica Cut types
    public function setModificationCut(Request $request ){
      $datos=[
        'idCod'=>$request->get('idcodCut'),
        'nameS'=>$request->get('nameCut')
      ];

       Cut::where('ID_CUT', $datos['idCod'])
          ->update([
            'NAME_CUT'=>$datos['nameS']
          ]);

      return $this->getTools('modification');
    }

    //eliminar Cut types
    public function getDeleteCut($ID_CUT){
      Cut::destroy($ID_CUT);
      return $this->getTools('deleting');
    }
}
