@extends('products.headers.product')

@section('body')

@include('products.implements.breadcrumps')
@include('products.implements.messageTools')

  <section id="main" class="container">
    <article class="row">
        <div class="form-horizontal">
          <div class="form-group">
              <label class="col-xs-2 col-sm-2 control-label">Search</label>
              <div class="inner-addon left-addon col-xs-8 col-sm-8 ">
                  <i class="glyphicon glyphicon-search" style="padding-left:25px;"></i>
                  <input type="text" class="form-control" name="varietySearch" placeholder="Enter your search"/>
              </div>

            </div>
        </div>
    </article>

    <article class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-striped" id="table">
          <thead>
              <th> Name</th>
              <th> Quantity </th>
              <th> Date </th>
              <th> Materials </th>
              <th></th>
          </thead>
          <tbody>
                <tr>
                  <td></td> <td></td> <td></td><td></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-xs">Action </button>
                      <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                        <span class="caret"></span>
                      </button>

                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#" data-toggle="modal" data-target="#myRegister" onclick="setRegistros('','','setModificationColor')">Edit</a></li>
                        <li class="divider"></li>
                        <li><a href="#" data-toggle="modal" data-target="#myRegisterDel" onclick="setRegistrosDel('','','getDeleteColor')">Delete</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              <tfoot>
                <tr>
                <td></td><td></td><td></td>
                <td>
                  <ul class="pagination pagination-sm">
                    <li>
                      <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li>
                      <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </td>
                  </tr>
              </tfoot>
          </tbody>
        </table>
      </div>
    </article>

  </section>

@endsection
