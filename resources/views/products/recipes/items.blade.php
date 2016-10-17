@extends('products.headers.product')

@section('body')

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
               <div class="inner-addon left-addon col-xs-2 col-sm-2">
                 <button type="button" class="btn btn-inbloom" data-toggle="modal" data-target="#myRegister" onclick="setRegistrosItems('', '', '', '','', '', '', 'setInsertItems')">New register</button>
               </div>
             </div>
         </div>
     </article>

     <article class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <table class="table table-striped">
           <thead>
               <th> Specie </th>
               <th> Color </th>
               <th> Process </th>
               <th> Type </th>
               <th> Cut </th>
               <th> Grade </th>
               <th></th>
           </thead>
           <tbody>
             @foreach ($datos['tblItems'] as $datosItem)
               <tr>
                 <td>{{$datosItem->NAME_SPECIE}}</td><td>{{$datosItem->NAME_COLOR}}</td><td>{{$datosItem->TYPE_PROCESS}}</td>
                 <td>{{$datosItem->NAME_ITYPES}}</td><td>{{$datosItem->NAME_CUT}}</td><td>{{$datosItem->NAME_GRADE}}</td>
                 <td>
                   <div class="btn-group">
                     <button type="button" class="btn btn-default btn-xs">Action </button>
                     <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                       <span class="caret"></span>
                     </button>

                     <ul class="dropdown-menu" role="menu">
                       <li><a href="#" data-toggle="modal" data-target="#myRegister" onclick="setRegistrosItems({{$datosItem->ID_ITEM}},{{$datosItem->ID_SPECIE}},{{$datosItem->ID_COLOR}},{{$datosItem->ID_PROCESS}},{{$datosItem->ID_ITYPES}},{{$datosItem->ID_CUT}},{{$datosItem->ID_GRADE}},'setModificationItems')">Edit</a></li>
                       <li class="divider"></li>
                       <li><a href="#" data-toggle="modal" data-target="#myRegisterDel" onclick="setRegistrosItemsDel({{$datosItem->ID_ITEM}}, '{{$datosItem->NAME_SPECIE}}','getDeleteItems')">Delete</a></li>
                     </ul>
                   </div>
                 </td>

               </tr>
              @endforeach
           </tbody>
         </table>
       </div>
     </article>

   </section>

 @endsection

 @section('modals')


   <div class="modal fade" id="myRegisterDel" tabindex="-1" role="dialog" aria-labelledby="myRegisterDel">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <form class="form-horizontal" method="get" id="formDel">
         <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel">Items</h4>
         </div>
         <div class="modal-body">
             {{csrf_field()}}
             <div class="form-group" hidden="true">
               <label class="col-sm-2 control-label">Id</label>
               <div class="col-sm-12">
                 <input type="text" class="form-control" id="txtIdDel" name="txtIdDel"/>
               </div>
             </div>

             <div class="form-group">
               <label class="col-sm-2 control-label">Name</label>
               <div class="col-sm-8">
                 <input type="text" class="form-control" id="txtNameDel" name="txtNameDel" readonly="true"/>
               </div>
             </div>

         </div>
         <div class="modal-footer">
           <button type="submit" class="btn btn-danger">  Yes </button>
           <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">  No </button>
         </div>
         </form>
       </div>
     </div>
   </div>

 @endsection
