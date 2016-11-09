@extends('products.headers.product')

@section('body')
  @include('products.implements.breadcrumps')
  @include('products.implements.messageTools')

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
                <a href="setInsertProduct" class="btn btn-inbloom">Add</a>
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
              <td>
                <a href="#" data-toggle="modal" data-target="#myRegisterEdit" onclick="setRegistrosEdit('{{$product->ID_PRODUCT}}','{{$product->CODE_PRODUCT}}','{{$product->NAME_PRODUCT}}','getEditProduct')">
                  {{$product->CODE_PRODUCT}}
                </a>
              </td>
              <td>{{$product->NAME_PRODUCT}}</td><td>{{$product->ONLINENAME_PRODUCT}}</td>
              <td>{{$product->UPC_PRODUCT}}</td><td>{{$product->TYPEBOXE_BTYPE}}</td><td><img class="img-circle img-product-inbloom" src="{{URL::asset($product->IMAGE_PRODUCT)}}"/></td><td></td>
              <td>
                <div class="btn-group">
                  <button class="btn delete" data-toggle="modal" data-target="#myRegisterDel" onclick="setRegistrosDel('{{$product->ID_PRODUCT}}','{{$product->NAME_PRODUCT}}','getDeleteProduct')"></button>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </article>
  </section>
@endsection

@section('modals')
    @include('products.implements.modalsDeleteTools')
    @include('products.implements.modalsEditTools')
@endsection
