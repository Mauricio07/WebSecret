<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inbloom Group S.A.</title>
    <!--Bootstrap stilos-->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <!--default stilos-->
    <link rel="stylesheet" href="{{URL::asset('css/defaultBarra.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/controles.css')}}">

  </head>
  <body>
    @include('implements.navigationbarproduct');
    <!-- Formularios de navegacion -->
    <!--Productos-->
    <section>
      <div class="frm">
      	<div class="busquedaArticulo form-group">
      		<label class="titulos" for="busqueArticulo">List of products</label>
      		<input type="text" placeholder="Buscar" class="form-control">
      	</div>
      	<div class="formularios">
      		<table class="table">
      			<thead>
      				<tr>
      					<th>Id</th>
      					<th>Imag</th>
      					<th>Name</th>
      					<th>type</th>
      					<th>Presentation</th>
      					<th></th>
      					<th></th>
      				</tr>
      			</thead>
      			<tbody>
      				<tr>
      					<td>1</td>
      					<td>xxx</td>
      					<td>Rainbow</td>
      					<td>48x48</td>
      					<td>ninguna</td>
      					<td><a href="#" id="modifica" data-toggle="modal" data-placement="buttom" title="Modify" data-target=".bs-modificar"></a></td>
      					<td><a href="#" id="elimina" data-toggle="modal" data-placement="buttom" title="Delete" data-target=".bs-eliminar"></a></td>
      				</tr>
      				<tr>
      					<td>2</td>
      					<td>xxx</td>
      					<td>Rainbow</td>
      					<td>48x48</td>
      					<td>ninguna</td>
      					<td><a href="#" id="modifica" data-toggle="modal" data-target=".bs-modificar" title="Modify" ></a></td>
      					<td><a href="#" id="elimina" data-toggle="modal" data-target=".bs-eliminar" title="Delete" ></a></td>
      				</tr>
      			</tbody>
      		</table>
      	</div>
      </div>
    </section>
  </body>
  <script src="{{URL::asset('js/jquery-3.1.0.min.js')}}" charset="utf-8"></script>
  <script src="{{URL::asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
</html>
