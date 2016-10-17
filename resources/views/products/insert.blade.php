@extends('products.headers.product')

@section('body')

    @include('products.implements.messageTools')
    <!--Formulario ingreso-->

    <article class="container" >
      <div class="row">
        <div>
          <div class="form-group col-sm-3 col-md-4 col-lg-3">
            <label for="">Code Product</label>
            <input type="text" class="form-control" placeholder="Code">
            <br>
            <label for="">Code Upc</label>
            <input type="text" class="form-control" placeholder="Code Upc">
            <br>
            <label for="">Description</label>
            <input type="text" class="form-control col-lg-10" placeholder="Code Upc">
          </div>

          <div class="form-group col-sm-5 col-md-5 col-lg-5">
            <label for="">Name Product</label>
            <input type="text" class="form-control" placeholder="Name">
            <br>
            <label for="">Online name</label>
            <input type="text" class="form-control" placeholder="Online name">
            <br>
            <label for="">Image</label>
            <input type="file" class="form-control" placeholder="Image">

          </div>

          <div class="form-group col-sm-2 col-md-2 col-lg-2">
            <label for="">State</label>
            <input type="text" class="form-control" placeholder="Name">
          </div>
        </div>

        <div class="form-group col-sm-2 col-md-2 col-lg-2">
          <img src="{{URL::asset('imgs/logoEmpresa.png')}}" class="imgs-prod-inbloom img-responsive img-rounded" alt="Responsive image"/>
        </div>
      </div>
    </article>

    <article class="container"><section class="row"> <hr></section> </article>

    @include('products.implements.tableProductMaterial')

        <article class="container"><section class="row"> <hr></section> </article>

    @include('products.implements.tableRecipe')

        <article class="container"><section class="row"> <hr></section> </article>

        <article class="container">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <button type="submit" class="btn btn-inbloom">Save</button>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <button type="submit" class="btn btn-inbloom-default">Copy</button>
            </div>
          </div>
        </article>

        <article class="container">
          <div class="row"><hr></div>
        </article>
@endsection

@section('modals')
  @include('products.implements.modalsInsertUpdateRecipe')
  @include('products.implements.modalsInsertProduct')
  @include('products.implements.modalsDeleteTools')
@endsection
