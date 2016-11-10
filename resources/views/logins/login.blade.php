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

    <div class="frmInicio">
      <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
          <div id="imagenEmp"></div>
          <form id="bloque2" action="loginSucess_" method="post">
            <div class="form-group">
              {{ csrf_field() }}
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
            <button type="submit" class="btn btn-inbloom" >Login</button>
            <div id="getResp">{{Session::get('message')}}</div>
          </form>
        </div>
      </div>
    </div>
  </body>

  <script src="{{URL::asset('js/jquery-3.1.0.min.js')}}" charset="utf-8"></script>

</html>
