<!-- bread crumbs-->
<div class="container">
  <ol class="breadcrumb">
    <li><a href="home">Home</a></li>
    <li><a href="getListProduct">Product</a></li>
    <li class="active">{{$tittle}}</li>
  </ol>
</div>

<div class="container">
  <article class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h3>Manager {{$tittle}}</h3>
    </div>
  </article>
</div>

<!-- Message-->
<div class="container">
  <article class="row">
    @if (count($errors))
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
          <strong>{{$error}}</strong>
          <a href="#" class="close" data-dismiss="alert">&times;</a>
        </div>
      @endforeach
    @endif

    @if (isset($post) && (Session::get('message')))
      <div class="alert alert-success alert-dismissible" role="alert">
        <span> Transaction <strong>{{Session::get('message')}}</strong> success</span>
        <a href="#" class="close" data-dismiss="alert">&times;</a>
      </div>
    @endif
  </article>
 </div>
