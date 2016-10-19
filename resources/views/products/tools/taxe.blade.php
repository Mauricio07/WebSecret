@extends('products.headers.product')

@section('body')

@include('products.implements.breadcrumps')
@include('products.implements.messageTools')

  <section id="main" class="container">
    <article class="row">
        <div class="form-horizontal">
          <div class="form-group">
              <label class="col-xs-2 col-sm-2 control-label">Search</label>
              <div class="inner-addon left-addon col-xs-8 col-sm-8 ">
                  <i class="glyphicon glyphicon-search" style="padding-left:25px;"></i>
                  <input type="text" class="form-control" name="taxeSearch" placeholder="Enter your search"/>
              </div>
              <div class="inner-addon left-addon col-xs-2 col-sm-2">
                <button type="button" class="btn btn-inbloom" data-toggle="modal" data-target="#myRegister" onclick="setRegistrosTaxes('','','','','setInsertTaxe')">New register</button>
              </div>
            </div>
        </div>
    </article>

    <article class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-striped">
          <thead>
              <th> Code </th>
              <th> Name </th>
              <th> % </th>
              <th> Date </th>
              <th></th>
          </thead>
          <tbody>
            <tr>
              @foreach ($tblDatos as $datos)
                <tr>
                  <td> {{$datos->COD_TAX}}</td><td> {{$datos->NAME_TAX}}</td><td> {{$datos->COST_TAX}}</td><td> {{$datos->DATE_TAX}}</td>

                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-xs">Action </button>
                      <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                        <span class="caret"></span>
                      </button>

                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#" data-toggle="modal" data-target="#myRegister" onclick="setRegistrosTaxes('{{$datos->ID_TAX}}','{{$datos->COD_TAX}}','{{$datos->NAME_TAX}}','{{$datos->COST_TAX}}','setModificationTaxe')">Edit</a></li>
                        <li class="divider"></li>
                        <li><a href="#" data-toggle="modal" data-target="#myRegisterDel" onclick="setRegistrosTaxesDel('{{$datos->ID_TAX}}','{{$datos->COD_TAX}}','{{$datos->NAME_TAX}}','getDeleteTaxe')">Delete</a></li>
                      </ul>
                    </div>
                  </td>

                </tr>
              @endforeach

            </tr>
          </tbody>
        </table>
      </div>
    </article>

  </section>

@endsection

@section('modals')
  <div class="modal fade" id="myRegister" tabindex="-1" role="dialog" aria-labelledby="myRegister">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="form-horizontal" method="post" id="form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Taxes</h4>
        </div>
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group" hidden="true">
              <label class="col-sm-2 control-label">Id</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="txtId" name="txtId"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Code</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="txtCode" name="txtCode" placeholder="Code" required="true"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Name" required="true"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Porcentage</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="txtCost" name="txtCost" placeholder="Cost" required="true" onkeypress="return soloNumeros(event)"/>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
              Save changes
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete -->
  <div class="modal fade" id="myRegisterDel" tabindex="-1" role="dialog" aria-labelledby="myRegisterDel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="form-horizontal" id="formDel" method="get">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Taxes</h4>
        </div>
        <div class="modal-body">
          <h4>Are you sure you want to delete??</h4>
            {{csrf_field()}}
            <div class="form-group" hidden="true">
              <label class="col-sm-2 control-label">Id</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="txtIdDel" name="txtIdDel"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Code</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="txtCodeDel" name="txtCodeDel" readonly="true"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="txtNameDel" name="txtNameDel" readonly="true"/>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">  Yes </button>
          <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">  No </button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection