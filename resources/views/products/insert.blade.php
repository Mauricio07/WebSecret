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
    <form id="frmProduct" method="post" action="setAddProduct">

          {{csrf_field()}}

          <div class="container">
              <div class="row">

                <div class="col-xs-3">
                  <div class="form-group has-feedback">
                    <label for="Code Product">Code Product</label>
                      <input type="text" name="txtCodeProduct" class="form-control" placeholder="Code"  value="{{old('txtCodeProduct')}}" required/>
                      @if ($errors->has('txtCodeProduct')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtCodeProduct')}} </p>@endif
                  </div>
                  <div class="form-group has-feedback">
                    <label for="Code Upc">Code Upc</label>
                    <input type="text" name="txtCodeUpc"class="form-control" placeholder="Code Upc" value="{{old('txtCodeUpc')}}" required/>
                    @if ($errors->has('txtCodeUpc')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtCodeUpc')}} </p>@endif
                  </div>
                  <div class="form-group has-feedback">
                    <label for="State">State</label>
                    <input type="text" name="txtState" class="form-control" placeholder="State" required/>
                  </div>
                  <div class="form-group has-feedback">
                    <label for="Code Product">Pack</label>
                      <input type="text" name="txtPack" class="form-control" placeholder="Pack" onkeypress="return soloNumeros(event)" value="{{old('txtPack')}}" required/>
                      @if ($errors->has('txtPack')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtPack')}} </p>@endif
                  </div>
                </div>

                <div class="col-xs-5 col-xs-offset-1">
                  <div class="form-group has-feedback">
                    <label for="Name Product">Name Product</label>
                    <input type="text" name="txtNameProduct" class="form-control" placeholder="Name" value="{{old('txtNameProduct')}}" required/>
                    @if ($errors->has('txtNameProduct')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtNameProduct')}} </p>@endif
                  </div>
                  <div class="form-group has-feedback">
                    <label for="Online name">Online name</label>
                    <input type="text" name="txtOnlineName" class="form-control" placeholder="Online name" value="{{old('txtOnlineName')}}" required/>
                    @if ($errors->has('txtOnlineName')) <span class="glyphicon glyphicon-remove form-control-feedback frm-error" aria-hidden="true"></span><p class="help-block">{{$errors->first('txtOnlineName')}} </p>@endif
                  </div>
                  <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" name="txtDescription" class="form-control" placeholder="Description">
                  </div>
                </div>

                <div class="col-xs-3">
                    <img src="{{URL::asset('imgs/logoEmpresa.png')}}" class="imgs-prod-inbloom img-responsive img-rounded" alt="Responsive image"/>
                </div>

              </div>
          </div>

          <div class="container">
              <div class="row">
                <hr>
                <input type="text" id="nameMaterials" name="nameMaterials[]" hidden="true"/>
                @include('products.implements.tableMaterial')
              </div>
          </div>

          <div class="container">
              <div class="row">
                <hr>
                <input type="text" id="nameRecipe" name="nameRecipe[]" hidden="true"/>
                @include('products.implements.tableRecipe')
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
  @include('products.implements.modalsDeleteTools')
@endsection
