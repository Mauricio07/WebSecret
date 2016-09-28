<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inbloom Group S.A.</title>
    <!--Bootstrap stilos-->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <!--default stilos-->
    <link rel="stylesheet" href="{{URL::asset('css/controles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/product_style.css')}}">
  </head>
  <body>

  @include('implements.navigationbarproduct');
    <div class="container">
      <h3>Product manager</h3>
    </div>

<!--Formulario ingreso-->

  <section class="container">
    <article class="row">
      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Code</label>
              <input type="text" class="form-control" id="productname" placeholder="Code">
          </div>

          <div class="form-group">
              <label>Type</label>
              <select class="form-control">
                <option>-Select-</option>
                <option>0001</option>
              </select>
          </div>

          <div class="form-group">
              <label>Commerce</label>
              <select class="form-control">
                <option>-Select-</option>
                <option>0001</option>
              </select>
          </div>
      </div>

      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Product name</label>
              <input type="text" class="form-control" placeholder="Product name">
          </div>

          <div class="form-group">
              <label>Status</label>
              <select class="form-control">
                <option>-Select-</option>
                <option>0001</option>
              </select>
          </div>

          <div class="form-group">
              <label>Description</label>
              <input type="text" class="form-control" placeholder="Description">
          </div>
      </div>
      <div class="col-xs- col-sm- col-md- col-lg-4">
        <span class="img-form img-thumbnail"></span>
      </div>
    </article>

    <article class="row">
      <hr>
    </article>

    <article class="row">
      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Amount of packs</label>
              <input type="text" class="form-control" placeholder="Amount of packs">
          </div>
      </div>
      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Boxes</label>
              <select class="form-control">
                <option>-Select-</option>
                <option>0001</option>
              </select>
          </div>
      </div>
      <div class="col-xs- col-sm- col-md- col-lg-4">
          <div class="form-group">
              <label>Image</label>
              <input type="file" class="form-control" placeholder="Image">
          </div>
      </div>
    </article>

    <article class="row">
      <hr>
    </article>

    <article class="row">
      <div class="col-xs- col-sm- col-md- col-lg-12">
        <div class="form-group">
        <table class="table table-hover">
          <label>Materials</label>
            <thead>
              <th>#</th>
              <th>Name</th>
              <th>Amount</th>
              <th>cost</th>
              <th></th>
            </thead>
          <tbody>
              <tr>
                <td>1</td>
                <td>Rainbow</td>
                <td>12 bouquets</td>
                <td>Rainbow white</td>
                <td><input type="checkbox"> </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Rainbow</td>
                <td>12 bouquets</td>
                <td>Rainbow white</td>
                <td><input type="checkbox"> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </article>

    <article class="row">
      <hr>
    </article>

    <article class="row">
      <div class="col-xs- col-sm- col-md- col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading">
              <h3 class="panel-title">Prescription</h3>

                <div class="form-group" id="frm_control">
                    <select class="form-control" style="width: 100%;">
                      <option>Recipies 00	</option>
                      <option>Recipies 01</option>
                      <option>Recipies 02</option>
                    </select>
                </div>
            </div>

            <div class="panel-body">
               <div class="form-group">
                 <table class="table table-hover">
                  <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th></th>
                  </thead>
                  <tbody>
                      <tr>
                        <td><a href="">+</a></td>
                        <td>Rainbow</td>
                        <td>12 bouquets</td>
                        <td>Rainbow white</td>
                        <td><input type="checkbox"> </td>
                      </tr>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </article>

    <article class="row">
      <hr>
    </article>

    <article class="row">
      <div class="col-xs- col-sm- col-md- col-lg-6">
        <button type="submit" class="btn btn-inbloom">Save</button>
      </div>
      <div class="col-xs- col-sm- col-md- col-lg-6">
        <button type="submit" class="btn btn-inbloom-default">Copy</button>
      </div>
    </article>

  </section>
  <section class="container">
    <article class="row">
      <hr>
    </article>
  </section>

<!--Formulario ingreso final-->
</body>
<script src="{{URL::asset('js/jquery-3.1.0.min.js')}}" charset="utf-8"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
</html>
