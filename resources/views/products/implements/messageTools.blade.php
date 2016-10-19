
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
