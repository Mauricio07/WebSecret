<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inbloom Group</title>
      <!--Bootstrap stilos-->
      <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
      <!--default stilos-->
      <link rel="stylesheet" href="{{URL::asset('css/default.css')}}">
      <link rel="stylesheet" href="{{URL::asset('css/controles.css')}}">
  </head>
  <body>

    <div class="container">
      <div class="row">
          <div class="col-lg-offset-4 col-lg-5" style="margin-top:13%;">
            <div class="panel panel-default">
              <div class="panel-heading"></div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-sm-1" style="width:130px; margin-left:30px;">
                    <img src="{{URL::asset('imgs/logoEmpresa.png')}}" class="img-responsive"/>
                  </div>
                    <form action="login" method="post" class="col-sm-7">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="name">User name</label>
                        <div class="inner-addon left-addon">
                            <i class="glyphicon glyphicon-user"></i>
                            <input type="text" class="form-control" name="nameUser" placeholder="Enter your user name" autocomplete="off" required="true"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="passwordsUser">Password</label>
                        <div class="inner-addon left-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                          <input type="password" class="form-control" name="passwordUser" placeholder="Enter your password" required="true"/>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-inbloom"> Login </button>
                      @if (Session::has('messageLogin'))
                        <p class="text-error">{{Session::get('messageLogin')}}</p>
                      @endif
                    </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </body>
  <script src="{{URL::asset('js/jquery-3.1.0.min.js')}}" charset="utf-8"></script>

</html>
