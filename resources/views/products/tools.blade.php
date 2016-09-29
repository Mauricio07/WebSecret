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
                 <a class="info" href="#">link here</a>
              </div>
          </div>
        </div>

        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Product type</h2>
                 <a class="info" href="#">link here</a>
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
                 <a class="info" href="#">link here</a>
              </div>
          </div>
        </div>

        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Varietys</h2>
                 <a class="info" href="#">link here</a>
              </div>
          </div>
        </div>

        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Colors</h2>
                 <a class="info" href="#">link here</a>
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
                 <a class="info" href="#">link here</a>
              </div>
          </div>
        </div>

        <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="hovereffect">
              <img class="img-responsive" src="http://xoart.link/400/200/city" id="imgModulo">
              <div class="overlay">
                 <h2>Cuts</h2>
                 <a class="info" href="#">link here</a>
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

<!-- frm de species-->
<div class="modal fade" tabindex="-1" role="dialog" id="mySpecies">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Manager Species</h4>
      </div>
      <div class="modal-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Report</a></li>
          <li role="presentation"><a href="#insert" aria-controls="insert" role="tab" data-toggle="tab">Insert</a></li>
          <li role="presentation"><a href="#modify" aria-controls="modify" role="tab" data-toggle="tab">Modify</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">

            <table id="tableRep" class="table table-striped">
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Date</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($vSpecies as $vSpecie)
                  <tr>
                    <td>{{$vSpecie->ID_SPECIE}}</td> <td>{{$vSpecie->NAME_SPECIE}}</td> <td>{{$vSpecie->DATE_SPECIE}}</td>
                    <td>
                      <a href="#modify" onclick="modificarProducto({{$vSpecie->ID_SPECIE}},'{{$vSpecie->NAME_SPECIE}}')" aria-controls="modify" role="tab" data-toggle="tab">
                        <span class="modifi"></span>
                      </a>
                    </td>

                    <td><span class="delete"></span></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div role="tabpanel" class="tab-pane" id="insert">
            <form class="" action="" method="post">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="nameSpecie" placeholder="Enter name">
              </div>
              <div class="">
                <hr/>
              </div>
              <div class="container">
                <button class="btn btn-inbloom" type="submit">Save</button>
              </div>
            </form>
          </div>

          <div role="tabpanel" class="tab-pane" id="modify">
            <form class="" action="" method="post">
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="codModifica" name="idProdMod" hidden="true"/>
                <input type="text" class="form-control" id="txtModifica" name="nameSpecie" placeholder="Enter name">
              </div>

              <div class="container"> <hr/> </div>

              <div class="container">
                <button class="btn btn-inbloom" type="submit">Change</button>
              </div>
            </form>
          </div>
        </div>


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script src="{{URL::asset('js/jquery-3.1.0.min.js')}}" charset="utf-8"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
<script src="{{URL::asset('js/tablePag.js')}}" charset="utf-8"></script>
<script type="text/javascript">
  $('#tableRep').DataTable();

//Paso de parametros
  function modificarProducto(idProd,txtProd){
    document.getElementById('codModifica').setAttribute('value',idProd);
    document.getElementById('txtModifica').value=txtProd;
    
  }
</script>
</html>
