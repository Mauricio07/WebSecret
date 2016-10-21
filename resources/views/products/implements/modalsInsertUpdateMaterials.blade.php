<div class="modal fade" id="myRegisterMaterial" tabindex="-1" role="dialog" aria-labelledby="myRegisterMaterial">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="formMaterial"  method="post">
        {{csrf_field()}}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Manager {{$tittle}}</h4>
      </div>
      <div class="modal-body">
          <div class="form-group" hidden="true">
            <label class="col-sm-2 control-label">Id</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtCode" name="txtCode" placeholder="Code"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-9">
              <select class="form-control" id="txtMaterial" name="txtMaterials"  required="true">
                @foreach ($datos['tblMaterial'] as $dat)
                  <option value="{{$dat['ID_MATERIAL']}}">{{$dat['NAME_MATERIALS']}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Quantity</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtQuantityMat" name="txtQuantityMat" placeholder="Quantity" onkeypress="return soloNumeros(event)"/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Dimension</label>
            <div class="col-sm-9">
            <select class="form-control" id="txtDimension" name="txtDimension"  required="true">
              @foreach ($datos['tblDimension'] as $dat)
                <option value="{{$dat['ID_DIMENSIONS']}}">{{$dat['HEIGHT_DIMENSIONS']}} x {{$dat['WIDTH_DIMENSIONS']}} x {{$dat['DEPTH_DIMENSIONS']}}</option>
              @endforeach
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss='modal' arial-label='close' onclick="addItemsTableMaterials('tblMaterial');">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
            Save changes
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

@section('_scripts')
    <script type="text/javascript">

        // add item materials
        function addItemsTableMaterials(v_nameTbl){
          var vd_form=$('#formMaterial');
          var v_name=$('#txtMaterial');
          var v_quanty=$('#txtQuantityMat');
          var v_Dimen=$('#txtDimension');
          var ajaxResponse=document.getElementById('ajaxResponse');

          var vd_table=document.getElementById(v_nameTbl);   //nombre table
          var v_contenido="<tr>"+
          "<td>"+$(v_name).find(':selected').html()+"</td>"+
          "<td>"+$(v_quanty).val()+"</td>"+
          "<td>"+$(v_Dimen).find(':selected').html()+"</td>"+
          "<td> <div class='btn-group'>"
              +"<button type='button' class='btn btn-default btn-xs'>Action </button>"
              +"<button type='button' class='btn btn-default dropdown-toggle btn-xs' data-toggle='dropdown'>"
              +"<span class='caret'></span>"
              +"</button>"

              +"<ul class='dropdown-menu' role='menu'>"
              +"<li><a href='#' data-toggle='modal' data-target='#myRegisterMaterial'>Edit</a></li>"
              +"<li class='divider'></li>"
              +"<li><a href='#' data-toggle='modal' data-target='#myRegisterDel'>Delete</a></li>"
              +"</ul> </div> </td>"
              +"</tr>";
          $(vd_table).append(v_contenido);

          IdItemMaterialsProd++;

          //insert with ajax
          $.ajaxSetup({
            headers:{
              'X-CSRF-Token': $('input[name="_token"]').val()
            }
          });

          $.post('setAddInsertMaterial',{
            'IdItemMaterialsProd': IdItemMaterialsProd,
            'NomItemMaterialsProd': $(v_name).val(),
            'QuantItemMaterialsProd': $(v_quanty).val(),
            'DimItemMaterialsProd': $(v_Dimen).val(),
          },function(data){
            console.log('ingreso ok '+data);
            $(ajaxResponse).append('ingreso ok '+data);
          });

        }
    </script>
@endsection
