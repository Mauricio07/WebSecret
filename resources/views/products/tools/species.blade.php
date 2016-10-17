@extends('products.headers.product')

@section('body')

@include('products.implements.messageTools')

  <section id="main" class="container">
    <article class="row">
        <div class="form-horizontal">
          <div class="form-group">
              <label class="col-xs-2 col-sm-2 control-label">Search</label>
              <div class="inner-addon left-addon col-xs-8 col-sm-8 ">
                  <i class="glyphicon glyphicon-search" style="padding-left:25px;"></i>
                  <input type="text" class="form-control" name="varietySearch" placeholder="Enter your search"/>
              </div>
              <div class="inner-addon left-addon col-xs-2 col-sm-2">
                <button type="button" class="btn btn-inbloom" data-toggle="modal" data-target="#myRegister" onclick="setRegistroSpecie('','','1','1','setInsertSpecies')">New register</button>
              </div>
            </div>
        </div>
    </article>

    <article class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-striped">
          <thead>
              <th> Name </th>
              <th> Variety </th>
              <th> Code Taxe </th>
              <th> Name Taxe </th>
              <th> Date </th>
              <th></th>
          </thead>
          <tbody>
              @foreach ($tblDatos['tblSpecie'] as $datos)
                <tr>
                  <td>{{$datos->NAME_SPECIE}}</td><td>{{$datos->NAME_VARIETY}}</td><td>{{$datos->COD_TAX}}</td><td>{{$datos->NAME_TAX}}</td> <td>{{$datos->DATE_SPECIE}}</td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-xs">Action </button>
                      <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                        <span class="caret"></span>
                      </button>

                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#" data-toggle="modal" data-target="#myRegister" onclick="setRegistroSpecie('{{$datos->ID_SPECIE}}','{{$datos->NAME_SPECIE}}','{{$datos->ID_VARIETY}}','{{$datos->ID_TAX}}','setModificationSpecies')">Edit</a></li>
                        <li class="divider"></li>
                        <li><a href="#" data-toggle="modal" data-target="#myRegisterDel" onclick="setRegistrosDel('{{$datos->ID_SPECIE}}','{{$datos->NAME_SPECIE}}','getDeleteSpecies')">Delete</a></li>
                      </ul>
                    </div>
                  </td>

                </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </article>

  </section>

@endsection

@section('modals')
  <!-- Modal  insert y modify-->
  <div class="modal fade" id="myRegister" tabindex="-1" role="dialog" aria-labelledby="myRegister">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="form-horizontal" method="post" id="form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Species</h4>
        </div>
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group" hidden="true">
              <label class="col-sm-2 control-label">Id</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="txtCode" name="txtCode" placeholder="Code"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Name" required="true"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Variety</label>
              <div class="col-sm-9">
                <select class="form-control" id="txtVariety" name="txtVariety">
                  @foreach ($tblDatos['tblVariety'] as $datos)
                    <option value="{{$datos->ID_VARIETY}}">{{$datos->NAME_VARIETY}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Taxe</label>
              <div class="col-sm-9">
                <select class="form-control" id="txtTaxe" name="txtTaxe">
                  @foreach ($tblDatos['tblTaxe'] as $datos)
                    <option value="{{$datos->ID_TAX}}">{{$datos->COD_TAX}} {{$datos->NAME_TAX}}</option>
                  @endforeach
                </select>
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
          <h4 class="modal-title" id="myModalLabel">Species</h4>
        </div>
        <div class="modal-body">
          <h4>Are you sure you want to delete??</h4>
            {{csrf_field()}}
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
