@extends('products.headers.product')

@section('body')

    @include('products.implements.breadcrumps')

    <div class="container">
      <div class="row">
        @if (isset($post) && (Session::get('message')))
          <div class="alert alert-success alert-dismissible" role="alert">
            <span> Transaction <strong>{{Session::get('message')}}</strong> success</span>
            <a href="#" class="close" data-dismiss="alert">&times;</a>
          </div>
        @endif
      </div>
    </div>

    <!--Formulario ingreso-->
    <form id="frmProduct" method="post" action="setAddProduct" enctype="multipart/form-data">

          {{csrf_field()}}

          <div class="container">
              <div class="row">

                <div class="col-xs-3">
                  <div class="form-group has-feedback">
                    <label for="Code Product">SKU</label>
                      <input type="text" name="txtCodeProduct" class="form-control" placeholder="SKU"  value="{{old('txtCodeProduct')}}" required="true" autocomplete="off"/>
                      @if ($errors->has('txtCodeProduct')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtCodeProduct')}} </p>@endif
                  </div>
                  <div class="form-group has-feedback">
                    <label for="Code Upc">UPC</label>
                    <input type="text" name="txtCodeUpc"class="form-control" placeholder="UPC" value="{{old('txtCodeUpc')}}" required="true" autocomplete="off"/>
                    @if ($errors->has('txtCodeUpc')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtCodeUpc')}} </p>@endif
                  </div>
                  <div class="form-group has-feedback">
                    <label for="State">State</label>
                      <select class="form-control" name="txtState">
                          <option>Enable</option>
                      </select>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="Code Product">Pack</label>
                      <input type="text" name="txtPack" class="form-control" placeholder="Pack" onkeypress="return soloNumeros(event)" value="{{old('txtPack')}}" required="true" autocomplete="off"/>
                      @if ($errors->has('txtPack')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtPack')}} </p>@endif
                  </div>
                </div>

                <div class="col-xs-5 col-xs-offset-1">
                  <div class="form-group has-feedback">
                    <label for="Name Product">Name Product</label>
                    <input type="text" name="txtNameProduct" class="form-control" placeholder="Name" value="{{old('txtNameProduct')}}" required="true" autocomplete="off"/>
                    @if ($errors->has('txtNameProduct')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtNameProduct')}} </p>@endif
                  </div>
                  <div class="form-group has-feedback">
                    <label for="Online name">Online name</label>
                    <input type="text" name="txtOnlineName" class="form-control" placeholder="Online name" value="{{old('txtOnlineName')}}" required="true" autocomplete="off"/>
                    @if ($errors->has('txtOnlineName')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtOnlineName')}} </p>@endif
                  </div>
                  <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" name="txtDescription" class="form-control" placeholder="Description" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="Boxes">Boxes</label>
                    <select class="form-control" name="txtBoxes" id="txtBoxes" required="true" autocomplete="off">
                      @foreach ($datos['tblVwBoxes'] as $box)
                        <option value="{{$box->ID_BOX}}">{{$box->TYPEBOXE_BTYPE}} ({{$box->DATA}}) {{$box->KG_WEIGHT}} [LB]</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-xs-3">
                  <div class="drag-drop">
                    <input type="file" name="archivo" id="archivo" accept="image/jpeg" required="true"/>
                    <span class="glyphicon glyphicon-cloud-upload glyphicon-lg"></span>
                  </div>
                </div>
              </div>
          </div>

          <div class="container ">
              <div class="row">
                <hr>
                <div class="panel-inbloom has-feedback">
                  <div class="col-sm-5">
                    <h4>Materials </h4>
                  </div>
                  <div class="col-sm-5">
                    <div id="ajaxResponse"></div>
                  </div>
                  <div class="btn-group col-sm-2">
                    <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myRegisterMaterial">Add </button>
                    <button type="button" class="btn btn-default dropdown-toggle btn-md" onclick="displayTbl('divTblMaterial')">
                      <span class="caret"></span>
                    </button>
                  </div>
                  @if ($errors->has('MaterialsRecipe')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('MaterialsRecipe')}} </p>@endif
                </div>
                <div class="tbl_hidden" id="divTblMaterial">
                  <table class="table" id="tblMaterial">
                    <thead>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Quantity</th>
                      <th></th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

              </div>

          </div>

          <div class="container">
              <div class="row">
                <hr>
                <div class="panel-inbloom has-feedback">
                  <div class="col-sm-5">
                    <h4>Recipe</h4>
                  </div>
                  <div class="col-sm-5"><div id="ajaxRecipe"></div></div>
                  <div class="btn-group col-sm-2">
                    <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myRegisterRecipe" onclick="setLimpia()">Add </button>
                    <a href="#collapseRecipe" class="btn btn-default btn-md" data-toggle="collapse">
                      <span class="caret"></span>
                    </a>
                  </div>
                  @if ($errors->has('ItemsMaterialsRecipe')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('ItemsMaterialsRecipe')}} </p>@endif
                  @if ($errors->has('ItemRecipe')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('ItemRecipe')}} </p>@endif
                </div>

                <!--Div table modal recipe-->
                <br>
                <div class="container">
                  <div class="collapse" id="collapseRecipe">
                    <div class="well2">
                      <table class="table table-striped" id="tblRecipes">
                        <thead>
                          <th>Code</th>
                          <th>Name</th>
                          <th></th>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            
                  <div class="collapse" id="collapseItems">
                    <div class="well">
                      <table class="table" id="tblRecipe" name='tblRecipe'>
                        <thead>
                          <th></th>
                          <th>Specie</th>
                          <th>Color</th>
                          <th>Process</th>
                          <th>Types</th>
                          <th>Cuts</th>
                          <th>Grade</th>
                          <th>Quantity</th>
                          <th>Stems</th>
                          <th></th>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>

              </div>
          </div>

          <div class="container">
              <div class="row">
                <hr>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <button type="submit" class="btn btn-inbloom">Save</button>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" hidden="true">
                  <button type="submit" class="btn btn-inbloom-default">Copy</button>
                </div>
              </div>
          </div>

          <div class="container">
            <div class="row"><hr><br></div>
          </div>

    </form>
@endsection

@section('modals')
  @include('products.implements.modalsInsertUpdateRecipe')
  @include('products.implements.modalsInsertUpdateMaterials')
  @include('products.implements.modalsInsertUpdateMaterialsItems')
  @include('products.implements.tblDetailRecipeMaterial')
  @include('products.implements.modalsDeleteTools')
  @include('products.implements.modalsInsertRecipe')
@endsection
