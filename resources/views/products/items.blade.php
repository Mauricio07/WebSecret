@extends('headers.product')

@section('body')

  <div class="container">
    <ol class="breadcrumb">
      <li><a href="home">Home</a></li>
      <li><a href="getListProduct">Product</a></li>
      <li class="active">Items</li>
    </ol>
  </div>

  <div class="container">
    <article class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3>Manager Items</h3>
      </div>
    </article>
  </div>

  <div class="container">
    <article class="row">
      @if (Session::get('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <p>
            <strong>Success </strong> {{Session::get('message')}}
          </p>
        </div>
      @endif
    </article>
   </div>

   <section id="main" class="container">
     <article class="row">
         <div class="form-horizontal">
           <div class="form-group">
               <label class="col-xs-2 col-sm-2 control-label">Search</label>
               <div class="inner-addon left-addon col-xs-8 col-sm-8 ">
                   <i class="glyphicon glyphicon-search" style="padding-left:25px;"></i>
                   <input type="text" class="form-control" name="varietySearch" placeholder="Enter your search"/>
               </div>
               <div class="inner-addon left-addon col-xs-2 col-sm-2">
                 <button type="button" class="btn btn-inbloom" data-toggle="modal" data-target="#myRegister" onclick="setRegistros('','','')">New register</button>
               </div>
             </div>
         </div>
     </article>

     <article class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <table class="table table-striped">
           <thead>
               <th> Name </th>
               <th> Recipes </th>
               <th> Quantity </th>
               <th> Color </th>
               <th> Variety </th>
               <th> Grade </th>
               <th> Cut </th>
               <th> Tax </th>
               <th></th>
           </thead>
           <tbody>
             <tr>

                 <tr>
                   <td>$datos->ID_COLOR</td> <td>$datos->NAME_COLOR</td> <td>$datos->DATE_COLOR</td>
                   <td>
                     <div class="btn-group">
                       <button type="button" class="btn btn-default btn-xs">Action </button>
                       <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                         <span class="caret"></span>
                       </button>

                       <ul class="dropdown-menu" role="menu">
                         <li><a href="#" data-toggle="modal" data-target="#myRegister" onclick="setRegistros('$datos->ID_COLOR','$datos->NAME_COLOR','setModificationColor')">Edit</a></li>
                         <li class="divider"></li>
                         <li><a href="#" data-toggle="modal" data-target="#myRegisterDel" onclick="setRegistrosDel('$datos->ID_COLOR','$datos->NAME_COLOR','getDeleteColor')">Delete</a></li>
                       </ul>
                     </div>
                   </td>

                 </tr>


             </tr>
           </tbody>
         </table>
       </div>
     </article>

   </section>

 @endsection

 @section('modals')
   <div class="modal fade" id="myRegister" tabindex="-1" role="dialog" aria-labelledby="myRegister">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <form class="form-horizontal" method="post" id="form">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">Items</h4>
         </div>
         <div class="modal-body">
             {{csrf_field()}}
             <div class="form-group" hidden="true">
               <label class="col-sm-2 control-label">Id</label>
               <div class="col-sm-12">
                 <input type="text" class="form-control" id="txtId" name="txtId" placeholder="Code"/>
               </div>
             </div>

             <div class="form-group">
               <label class="col-sm-2 control-label">Name</label>
               <div class="col-sm-4">
                 <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Name" required="true"/>
               </div>
               <label class="col-sm-2 control-label">Quantity</label>
               <div class="col-sm-3">
                 <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Quantity" required="true" onkeypress="return soloNumeros(event)"/>
               </div>
             </div>

             <hr>

             <div class="form-group">
               <label class="col-sm-2 control-label">Types</label>
               <div class="col-sm-4">
                 <select class="form-control" id="txtName" name="txtName" required="true">
                    <option>01</option>
                 </select>
               </div>
               <label class="col-sm-2 control-label">Color</label>
               <div class="col-sm-3">
                 <select class="form-control" id="txtName" name="txtName" required="true">
                    <option>01</option>
                 </select>
                </div>
             </div>

             <div class="form-group">
               <label class="col-sm-2 control-label">Variety</label>
               <div class="col-sm-4">
                 <select class="form-control" id="txtName" name="txtName" required="true">
                    <option>01</option>
                 </select>
               </div>
               <label class="col-sm-2 control-label">Specie</label>
               <div class="col-sm-3">
               <select class="form-control" id="txtName" name="txtName"  required="true">
                  <option>01</option>
               </select>
             </div>
             </div>

             <div class="form-group">
               <label class="col-sm-2 control-label">Grade</label>
               <div class="col-sm-4">
                 <select class="form-control" id="txtName" name="txtName"  required="true">
                    <option>01</option>
                 </select>
               </div>
               <label class="col-sm-2 control-label">Cuts</label>
               <div class="col-sm-3">
               <select class="form-control" id="txtName" name="txtName" required="true">
                  <option>01</option>
               </select>
             </div>
             </div>

             <hr>

             <div class="form-group">
               <label class="col-sm-2 control-label">Cost</label>
               <div class="col-sm-4">
                 <select class="form-control" id="txtName" name="txtName"  required="true">
                    <option>01</option>
                 </select>
               </div>
               <label class="col-sm-2 control-label">Tax</label>
               <div class="col-sm-3">
               <select class="form-control" id="txtName" name="txtName" required="true">
                  <option>01</option>
               </select>
              </div>
             </div>

         </div>
         <div class="modal-footer">
           <button type="submit" class="btn btn-default">
               <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
               Save changes
           </button>
         </div>
         </form>
       </div>
     </div>
   </div>

 @endsection
