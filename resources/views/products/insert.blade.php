@extends('products.headers.product')

@section('body')

@include('products.implements.messageTools')
<!--Formulario ingreso-->

  <section class="container">
    <article class="row">
      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Code</label>
              <input type="text" class="form-control" id="productname" placeholder="Code">
          </div>

          <div class="form-group">
              <label>Type</label>
              <select class="form-control">
                <option>-Select-</option>
                <option>0001</option>
              </select>
          </div>

          <div class="form-group">
              <label>Commerce</label>
              <select class="form-control">
                <option>-Select-</option>
                <option>0001</option>
              </select>
          </div>
      </div>

      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Product name</label>
              <input type="text" class="form-control" placeholder="Product name">
          </div>

          <div class="form-group">
              <label>Status</label>
              <select class="form-control">
                <option>-Select-</option>
                <option>0001</option>
              </select>
          </div>

          <div class="form-group">
              <label>Description</label>
              <input type="text" class="form-control" placeholder="Description">
          </div>
      </div>
      <div class="col-xs- col-sm- col-md- col-lg-4">
        <span class="img-form img-thumbnail"></span>
      </div>
    </article>

    <article class="row">
      <hr>
    </article>

    <article class="row">
      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Amount of packs</label>
              <input type="text" class="form-control" placeholder="Amount of packs">
          </div>
      </div>
      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Boxes</label>
              <select class="form-control">
                <option>-Select-</option>
                <option>0001</option>
              </select>
          </div>
      </div>
      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Image</label>
              <input type="file" class="form-control" placeholder="Image">
          </div>
      </div>
    </article>

    <article class="row">
      <hr>
    </article>

@include('products.implements.tableProductMaterial')

    <article class="row">
      <hr>
    </article>

@include('products.implements.tableRecipe')

    <article class="row">
      <hr>
    </article>

    <article class="row">
      <div class="col-xs- col-sm- col-md- col-lg-6">
        <button type="submit" class="btn btn-inbloom">Save</button>
      </div>
      <div class="col-xs- col-sm- col-md- col-lg-6">
        <button type="submit" class="btn btn-inbloom-default">Copy</button>
      </div>
    </article>

  </section>
  <section class="container">
    <article class="row">
      <hr>
    </article>
  </section>
@endsection

@section('modals')
  @include('products.implements.modalsMaterial')
  @include('products.implements.modalsDeleteTools')
@endsection
