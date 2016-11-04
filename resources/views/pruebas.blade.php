@extends('products.headers.product')

@section('body')
    <form class="" action="uploadImage" method="post" enctype="multipart/form-data">
      <div class="container">
        <div class="row">
          <div class="col-sm-7">
            {{csrf_field()}}
            <input type="hidden" name="_tokenFile" value="{{csrf_token()}}">
            <input type="file" name="archivo" id="archivo"/>
          </div>
        </div>
        <div class="row">
          <button type="submit" name="button">Save</button>
          <button type="button" name="button" onclick="loadImage()">Ajax</button>
        </div>
      </div>


    </form>
@endsection
