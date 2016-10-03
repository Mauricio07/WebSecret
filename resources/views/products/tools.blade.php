<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inbloom Group S.A.</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/efectos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/controles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/product_style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/tablePag.css')}}">
  </head>
  <body>

    @include('implements.navigationbarproduct');

    <div class="container">
      <div class="col-xs- col-sm- col-md- col-lg-12">
        <h3>Tools Manager</h3>
          <div class="">
            @if (Session::get('message'))
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <p>
                  <strong>Success </strong> {{Session::get('message')}}
                </p>
              </div>
            @endif
           </div>
      </div>
    </div>

    <section class="main container">

      <article class="row">
        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Species</h2>
                 <a class="info" href="#" data-toggle="modal" data-target="#mySpecies">link here</a>
              </div>
          </div>
        </div>

        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Item Types</h2>
                 <a class="info" href="#" data-toggle="modal" data-target="#myItemsType">link here</a>
              </div>
          </div>
        </div>

        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Presentation</h2>
                 <a class="info" href="#" data-toggle="modal" data-target="#myPresentation">link here</a>
              </div>
          </div>
        </div>

      </article>

      <div class="row">
        <hr/  >
      </div>

      <article class="row">
        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Process</h2>
                 <a class="info" href="#" data-toggle="modal" data-target="#myProcess">link here</a>
              </div>
          </div>
        </div>

        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Varietys</h2>
                 <a class="info" href="#" data-toggle="modal" data-target="#myVariety">link here</a>
              </div>
          </div>
        </div>

        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Colors</h2>
                 <a class="info" href="#" data-toggle="modal" data-target="#myColor">link here</a>
              </div>
          </div>
        </div>

      </article>

      <div class="row">
        <hr/  >
      </div>

      <article class="row">
        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Grades</h2>
                 <a class="info" href="#" data-toggle="modal" data-target="#myGrade">link here</a>
              </div>
          </div>
        </div>

        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Cuts</h2>
                 <a class="info" href="#" data-toggle="modal" data-target="#myCut">link here</a>
              </div>
          </div>
        </div>
      </article>
    </section>
    <section class="container">
    <article class="row">
      <br/>
      <br/>
    </article>
    <section>
  </body>

@include('products.species')
@include('products.itemTypes')
@include('products.presentation')
@include('products.process')
@include('products.varieties')
@include('products.color')
@include('products.grade')
@include('products.cut')



<script src="{{URL::asset('js/jquery-3.1.0.min.js')}}" charset="utf-8"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
<script src="{{URL::asset('js/tablePag.js')}}" charset="utf-8"></script>
<script type="text/javascript">
  $('#tblSpecies').DataTable(); //consulta tblSpecie
  $('#tblItemsTypes').DataTable(); //consulta tblSpecie
  $('#tblPresentation').DataTable(); //consulta tblPresentation
  $('#tblProcess').DataTable(); //consulta tblProcess
  $('#tblVariety').DataTable(); //consulta tblVariety
  $('#tblColor').DataTable(); //consulta tblColor
  $('#tblGrade').DataTable(); //consulta tblGrade
  $('#tblCut').DataTable(); //consulta tblCut

  //Paso de parametros modificar species
  function modificarProductoSpecie(idProd,txtProd){
    document.getElementById('idcodMod').setAttribute('value',idProd);
    document.getElementById('txtModifica').value=txtProd;
  }

  //Paso de parametros modificar itemsType
  function modificarProductoItemType(idProd,txtProd){
    document.getElementById('idcodModItem').setAttribute('value',idProd);
    document.getElementById('txtModificaItemTypes').value=txtProd;
  }

  //Paso de parametros modificar ProductType
  function modificarPresentation(idProd,txtProd){
    document.getElementById('idcodPresentation').setAttribute('value',idProd);
    document.getElementById('txtModificaPresentation').value=txtProd;
  }

  //Paso de parametros modificar Process
  function modificarProcess(idProd,txtProd){
    document.getElementById('idcodProcess').setAttribute('value',idProd);
    document.getElementById('txtModificaProcess').value=txtProd;
  }

  //Paso de parametros modificar Variety
  function modificarVariety(idProd,txtProd){
    document.getElementById('idcodVariety').setAttribute('value',idProd);
    document.getElementById('txtModificaVariety').value=txtProd;
  }

  //Paso de parametros modificar Color
  function modificarColor(idProd,txtProd){
    document.getElementById('idcodColor').setAttribute('value',idProd);
    document.getElementById('txtModificaColor').value=txtProd;
  }

  //Paso de parametros modificar Grade
  function modificarGrade(idProd,txtProd){
    document.getElementById('idcodGrade').setAttribute('value',idProd);
    document.getElementById('txtModificaGrade').value=txtProd;
  }

  //Paso de parametros modificar Cut
  function modificarCut(idProd,txtProd){
    document.getElementById('idcodCut').setAttribute('value',idProd);
    document.getElementById('txtModificaCut').value=txtProd;
  }
</script>
</html>
