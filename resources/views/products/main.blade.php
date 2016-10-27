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
              <td>{{$product->CODE_PRODUCT}}</td><td>{{$product->NAME_PRODUCT}}</td><td>{{$product->ONLINENAME_PRODUCT}}</td>
              <td>{{$product->UPC_PRODUCT}}</td><td>{{$product->TYPEBOXE_BTYPE}}</td><td><img class="img-circle img-product-inbloom" src="{{URL::asset($product->IMAGE_PRODUCT)}}"/></td><td></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-xs">Action </button>
                  <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#myRegister" onclick="setRegistrosProduct('{{$product->ID_PRODUCT}}','setModificationColor')">Edit</a></li>
                    <li class="divider"></li>
                    <li><a href="#" data-toggle="modal" data-target="#myRegisterDel" onclick="setRegistrosDel('{{$product->ID_PRODUCT}}','{{$product->NAME_PRODUCT}}','getDeleteColor')">Delete</a></li>
                  </ul>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </article>
  </section>
@endsection
