
@extends('products.headers.product')

@section('body')

@include('products.implements.breadcrumps')
@include('products.implements.messageTools')

<div class="container">
  <article class="row">
      <div class="form-horizontal">
        <div class="form-group">
            <label class="col-xs-2 col-sm-2 control-label">Search</label>
            <div class="inner-addon left-addon col-xs-8 col-sm-8 ">
                <i class="glyphicon glyphicon-search" style="padding-left:25px;"></i>
                <input type="text" class="form-control" name="varietySearch" placeholder="Enter your search"/>
            </div>
            <div class="inner-addon left-addon col-xs-2 col-sm-2">
              <button type="button" class="btn btn-inbloom" data-toggle="modal" data-target="#myModalBoxes" onclick="setAddRegisterBoxes('','','','','','','setAddBoxes')">Add</button>
            </div>
          </div>
      </div>
  </article>
  <article class="row">
    <table class="table table-striped">
      <thead>
        <th>Type</th>
        <th>Length</th>
        <th>Width</th>
        <th>Height</th>
        <th>Weigth (Lb)</th>
        <th></th>
      </thead>
      <tbody>
        @foreach ($datos['tblBoxes'] as $value)
          <tr>
          <td>{{$value->TYPEBOXE_BTYPE}}</td>
          <td>{{$value->LENGTH_BOX}}</td>
          <td>{{$value->WIDTH_BOX}}</td>
          <td>{{$value->HEIGHT_BOX}}</td>
          <td>{{$value->LB_WEIGHT}}</td>
          <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </article>
</div>

@endsection

@section('modals')
  @include('products.implements.modalBoxes')
  @include('products.implements.modalsDeleteTools')
@endsection
