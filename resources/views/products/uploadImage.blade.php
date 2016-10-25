@extends('products.headers.product')

@section('body')

<form action="uploading" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="drag-drop">
    <input type="file" name="archivo" id="archivo" accept="image/jpeg"/>
    <span class="glyphicon glyphicon-cloud-upload glyphicon-lg"></span>
  </div>
  <button type="submit" class="btn btn-default btn-upload-Image" name="button" onclick="loadImage()">Uploading file</button>
</form>
@endsection
