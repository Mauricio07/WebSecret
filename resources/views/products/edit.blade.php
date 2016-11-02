@extends('products.headers.product')

@section('body')

    <!--Formulario ingreso-->
    <form id="frmProduct" method="post" action="setAddProduct" enctype="multipart/form-data">

          {{csrf_field()}}

          <div class="container">
              <div class="row">

                <div class="col-xs-3">
                  <div class="form-group has-feedback">
                    <label for="Code Product">SKU</label>
                      <input type="text" name="txtCodeProduct" id="txtCodeProduct" class="form-control" placeholder="SKU"  required="true" autocomplete="off"/>
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
                      <input type="text" name="txtPack" id="txtPack" class="form-control" placeholder="Pack" onkeypress="return soloNumeros(event)" value="{{old('txtPack')}}" required="true" autocomplete="off" readonly="true"/>
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
        </form>
    @endsection
