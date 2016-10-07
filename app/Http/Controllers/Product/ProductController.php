<?php

namespace inbloom\Http\Controllers\Product;

use Illuminate\Http\Request;
use inbloom\Http\Controllers\Controller;

use inbloom\Http\Requests;
use inbloom\Model\Product\Specie;
use inbloom\Model\Product\Items_type;
use inbloom\Model\Product\Presentation;
use inbloom\Model\Product\Process;
use inbloom\Model\Product\Variety;
use inbloom\Model\Product\Color;
use inbloom\Model\Product\Grade;
use inbloom\Model\Product\Cut;
use inbloom\Model\Product\Taxe;
use inbloom\Model\Product\Item;

class ProductController extends Controller
{
    //ingreso de productos
    public function setInsertProducts(){
      return view('products.insert');
    }

    /*
    * Module Item Types
    */
    //ingreso item types
    public function setInsertItemTypes(Request $request){

      $datos=[
          'NAME_ITYPES'=>$request->get('txtName'),
          'DATE_ITYPES'=>date('Ymd H:i:s') //fecha sistema
      ];

      Items_type::create($datos);

      return redirect('vw_ItemTypes')->with('message',"Save");
    }

    //modifica item types
    public function setModificationItemType(Request $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Items_type::where('ID_ITYPES', $datos['idCod'])
          ->update([
            'NAME_ITYPES'=>$datos['nameS']
          ]);

      return redirect('vw_ItemTypes')->with('message',"Modification");
    }

    //eliminar item types
    public function getDeleteItemsTypes(Request $request){
      $nom=$request->get('txtNameDel');
      Items_type::destroy($request->get('txtCodeDel'));
      return redirect('vw_ItemTypes')->with('message',"Deleting ".$nom);
    }

    /*
    * Module Taxes
    */
    //ingreso Taxes
    public function setInsertTaxe(Request $request){

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
    public function setModificationTaxe(Request $request ){
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

      return redirect('vw_Taxes')->with('message',"Modification");
    }

    //eliminar Taxes
    public function getDeleteTaxe(Request $request){
      $nom=$request->get('txtNameDel');
      Taxe::destroy($request->get('txtIdDel'));
      return redirect('vw_Taxes')->with('message',"Deleting ".$nom);
    }

    /*
    *   Module Presentation
    */
    //ingresa Product types
    public function setInsertPresentation(Request $request){

      $datos=[
          'NAME_PTYPE'=>$request->get('txtName'),
          'DATE_PTYPE'=>date('Ymd H:i:s') //fecha sistema
      ];

      Presentation::create($datos);

      return redirect('vw_Presentation')->with('message',"Save");
    }

    //modifica Product types
    public function setModificationPresentation(Request $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Presentation::where('ID_PTYPE', $datos['idCod'])
          ->update([
            'NAME_PTYPE'=>$datos['nameS']
          ]);

      return redirect('vw_Presentation')->with('message',"Modification");
    }

    //eliminar Product types
    public function getDeletePresentation(Request $request){
      $nom=$request->get('txtNameDel');
      Presentation::destroy($request->get('txtCodeDel'));
      return redirect('vw_Presentation')->with('message',"Deleting ".$nom);
    }

    /*
    * Module Process
    */
    //ingresa Process types
    public function setInsertProcess(Request $request){

      $datos=[
          'TYPE_PROCESS'=>$request->get('txtName'),
          'DATE_PROCESS'=>date('Ymd H:i:s') //fecha sistema
      ];

      Process::create($datos);

      return redirect('vw_Process')->with('message',"Save");
    }

    //modifica Process types
    public function setModificationProcess(Request $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Process::where('ID_PROCESS', $datos['idCod'])
          ->update([
            'TYPE_PROCESS'=>$datos['nameS']
          ]);

      return redirect('vw_Process')->with('message',"Modification");
    }

    //eliminar Process types
    public function getDeleteProcess(Request $request){
      $nom=$request->get('txtNameDel');
      Process::destroy($request->get('txtCodeDel'));
      return redirect('vw_Process')->with('message',"Deleting ".$nom);
    }

    //ingresa Variety types
    public function setInsertVariety(Request $request){

      $datos=[
          'NAME_VARIETY'=>$request->get('txtName'),
          'DATE_VARIETY'=>date('Ymd H:i:s') //fecha sistema
      ];

      Variety::create($datos);

      return redirect('vw_Variety')->with('message',"Save");
    }

    //modifica Variety types
    public function setModificationVariety(Request $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Variety::where('ID_VARIETY', $datos['idCod'])
          ->update([
            'NAME_VARIETY'=>$datos['nameS']
          ]);

      return redirect('vw_Variety')->with('message',"Modification");
    }

    //eliminar Variety types
    public function getDeleteVariety(Request $request){
      $nom=$request->get('txtNameDel');
      Variety::destroy($request->get('txtCodeDel'));
      return redirect('vw_Variety')->with('message',"Deleting ".$nom);
    }

    /*
    * Modul grade
    */
    //ingresa Grade types
    public function setInsertGrade(Request $request){

      $datos=[
          'NAME_GRADE'=>$request->get('txtName'),
          'DATE_GRADE'=>date('Ymd H:i:s') //fecha sistema
      ];

      Grade::create($datos);

      return redirect('vw_Grade')->with('message',"Save");
    }

    //modifica Grade types
    public function setModificationGrade(Request $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Grade::where('ID_GRADE', $datos['idCod'])
          ->update([
            'NAME_GRADE'=>$datos['nameS']
          ]);

      return redirect('vw_Grade')->with('message',"Modification");
    }

    //eliminar Grade types
    public function getDeleteGrade(Request $request){
      $nom=$request->get('txtNameDel');
      Grade::destroy($request->get('txtCodeDel'));
      return redirect('vw_Grade')->with('message',"Deleting ".$nom);
    }

    /*
    * Modulo de Cut
    */
    //ingresa Cut types
    public function setInsertCut(Request $request){

      $datos=[
          'NAME_CUT'=>$request->get('txtName'),
          'DATE_CUT'=>date('Ymd H:i:s') //fecha sistema
      ];

      Cut::create($datos);

      return redirect('vw_Cut')->with('message',"Save");
    }

    //modifica Cut types
    public function setModificationCut(Request $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Cut::where('ID_CUT', $datos['idCod'])
          ->update([
            'NAME_CUT'=>$datos['nameS']
          ]);

      return redirect('vw_Cut')->with('message',"Modification");
    }

    //eliminar Cut types
    public function getDeleteCut(Request $request){
      $nom=$request->get('txtNameDel');
      Cut::destroy($request->get('txtCodeDel'));
      return redirect('vw_Cut')->with('message',"Deleting ".$nom);
    }

    /*
    * Modulo Colors
    */

    //ingresa Color types
    public function setInsertColor(Request $request){

      $datos=[
          'NAME_COLOR'=>$request->get('txtName'),
          'DATE_COLOR'=>date('Ymd H:i:s') //fecha sistema
      ];

      Color::create($datos);

      return redirect('vw_Color')->with('message',"Save");
    }

    //modifica Color types
    public function setModificationColor(Request $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Color::where('ID_COLOR', $datos['idCod'])
          ->update([
            'NAME_COLOR'=>$datos['nameS']
          ]);

      return redirect('vw_Color')->with('message',"Modification");
    }

    //eliminar Color types
    public function getDeleteColor(Request $request){
      $nom=$request->get('txtNameDel');
      Color::destroy($request->get('txtCodeDel'));
      return redirect('vw_Color')->with('message',"Deleting ".$nom);
    }

    /*
    * Modulo Species
    */

    //ingresa Specie
    public function setInsertSpecies(Request $request){
    $datos=[
        'NAME_SPECIE'=>$request->get('txtName'),
        'DATE_SPECIE'=>date('Ymd H:i:s') //fecha sistema
    ];

    Specie::create($datos);
    return redirect('vw_Specie')->with('message',"Save");
    }

    //modifica Specie
    public function setModificationSpecies(Request $request ){
      $datos=[
        'idCod'=>$request->get('txtCode'),
        'nameS'=>$request->get('txtName')
      ];

       Specie::where('id_specie', $datos['idCod'])
          ->update([
            'name_specie'=>$datos['nameS']
          ]);

      return redirect('vw_Specie')->with('message',"Modification");
    }

    //eliminar Specie
    public function getDeleteSpecies(Request $request){
      $nom=$request->get('txtNameDel');
      Specie::destroy($request->get('txtCodeDel'));
      return redirect('vw_Specie')->with('message',"Deleting ".$nom);
    }

    //Insert items
    public function setInsertItems(Request $request){
      $datos=[
        'NAME_ITEM'=>$request->get('txtName'),
        'QUANTITY_ITEM'=>$request->get('txtQuant'),
        'ID_ITYPES'=>$request->get('txtType'),
        'ID_COLOR'=>$request->get('txtColor'),
        'ID_VARIETY'=>$request->get('txtVariety'),
        'ID_SPECIE'=>$request->get('txtSpecie'),
        'ID_GRADE'=>$request->get('txtGrade'),
        'ID_CUT'=>$request->get('txtCut'),
        'ID_TAX'=>$request->get('txtTaxe'),
        'ID_PROCESS'=>$request->get('txtProcess')
      ];

      Item::create($datos);

      return redirect('vw_Items')->with('message',"Save");
    }

    //modifica item
    public function setModificationItems(Request $request ){
       Item::where('ID_ITEM', $request->get('txtId'))
          ->update([
            'NAME_ITEM'=>$request->get('txtName'),
            'QUANTITY_ITEM'=>$request->get('txtQuant'),
            'ID_ITYPES'=>$request->get('txtType'),
            'ID_COLOR'=>$request->get('txtColor'),
            'ID_VARIETY'=>$request->get('txtVariety'),
            'ID_SPECIE'=>$request->get('txtSpecie'),
            'ID_GRADE'=>$request->get('txtGrade'),
            'ID_CUT'=>$request->get('txtCut'),
            'ID_TAX'=>$request->get('txtTaxe'),
            'ID_PROCESS'=>$request->get('txtProcess'),
          ]);

      return redirect('vw_Items')->with('message',"Modification");

    }

    //eliminar item
    public function getDeleteItems(Request $request){
      $nom=$request->get('txtNameDel');
      Item::destroy($request->get('txtIdDel'));
      return redirect('vw_Items')->with('message',"Deleting ".$nom);
    }

    /*
    * Model recipe
    */
    public function setInsertRecipe(Request $request){
      $datos=[

      ];
    }
}
