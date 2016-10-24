@extends('products.headers.product')

@section('body')
  @include('products.implements.breadcrumps')
  <section class="container">
    <article class="row">
        <div class="form-horizontal">
          <div class="form-group">
              <label class="col-xs-2 col-sm-2 control-label">Search</label>
              <div class="inner-addon left-addon col-xs-8 col-sm-8 ">
                  <i class="glyphicon glyphicon-search" style="padding-left:25px;"></i>
                  <input type="text" class="form-control" name="varietySearch" placeholder="Enter your search"/>
              </div>
              <div class="inner-addon left-addon col-xs-2 col-sm-2">
                <button type="button" class="btn btn-inbloom" data-toggle="modal" data-target="#myRegister" onclick="setRegistros('','','setInsertColor')">Add</button>
              </div>
            </div>
        </div>
    </article>
    <article class="row">
      <table class="table table-striped">
        <thead>
          <th>Code</th>
          <th>Name</th>
          <th>Online</th>
          <th>Upc</th>
          <th>Box</th>
          <th>Image</th>
          <th><th>
        </thead>
        <tbody>
          @foreach ($tblProducts['tblProductos'] as $product)
            <tr>
              <td>{{$product->CODE_PRODUCT}}</td><td>{{$product->NAME_PRODUCT}}</td><td>{{$product->ONLINENAME_PRODUCT}}</td>
              <td>{{$product->UPC_PRODUCT}}</td><td>{{$product->NAME_BOX}}</td><td>{{$product->IMAGE_PRODUCT}}</td><td></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </article>
  </section>
@endsection
