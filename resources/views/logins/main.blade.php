<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inbloom Group S.A.</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/default.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/inicio.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/efectos.css')}}">
  </head>
  <body>
    <!--<span id="imagenEmp"></span>-->
    <header>
      <div class="container-fluid">
        <h3>Inbloom group S.A.</h3>
      </div>
    </header>

    <!-- Cuerpo -->

    <div class="container">

        <div class="row"style="height:80px;"></div>
        <section class="main row">
          <article class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <span class="imgEmpresa img-thumbnail" > </span>
          </article>

          <!-- compras -->
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="hovereffect">
                  <img class="img-responsive" src="../imgs/purchase.png" id="imgModulo">
                  <div class="overlay">
                     <h2>procurement</h2>
                     <a class="info" href="#">link here</a>
                  </div>
              </div>
          </div>

          <!-- Ordenes -->
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="hovereffect">
                  <img class="img-responsive" src="../imgs/order2.png" id="imgModulo">
                  <div class="overlay">
                     <h2>Orders</h2>
                     <a class="info" href="#">link here</a>
                  </div>
              </div>
          </div>

          <!-- productos -->
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="hovereffect">
                  <img class="img-responsive" src="../imgs/rainbow.png" id="imgModulo">
                  <div class="overlay">
                     <h2>Products</h2>
                     <a class="info" href="getProducts">link here</a>
                  </div>
              </div>
          </div>

          <span style="display:block; height:25px;" class="col-xs-9 col-sm-9 col-md-9 col-lg-9"></span>  <!-- espacios -->

          <!-- facturas -->
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="hovereffect">
                  <img class="img-responsive" src="../imgs/facturas.png" id="imgModulo">
                  <div class="overlay">
                     <h2>Invoices</h2>
                     <a class="info" href="#">link here</a>
                  </div>
              </div>
          </div>

          <!-- materiales -->
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="hovereffect">
                  <img class="img-responsive" src="../imgs/materials.png" id="imgModulo">
                  <div class="overlay">
                     <h2>Materials</h2>
                     <a class="info" href="#">link here</a>
                  </div>
              </div>
          </div>

          <!-- cuarto frio -->
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="hovereffect">
                  <img class="img-responsive" src="../imgs/coldRoom.png" id="imgModulo">
                  <div class="overlay">
                     <h2>Cold room</h2>
                     <a class="info" href="#">link here</a>
                  </div>
              </div>
          </div>

        </section>
    </div>
  </body>

</html>
