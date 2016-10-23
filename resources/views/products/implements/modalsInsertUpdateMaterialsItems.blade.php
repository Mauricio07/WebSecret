<div class="modal fade" id="myRegisterMaterialItems" tabindex="-1" role="dialog" aria-labelledby="myRegisterMaterialItems">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="formMaterial">
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
                @foreach ($datos['tblMaterialItems'] as $dat)
                  <option value="{{$dat['ID_MATERIAL']}}">{{$dat['NAME_MATERIALS']}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Quantity</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtQuantityMat" name="txtQuantityMat" placeholder="Quantity" autocomplete="off" onkeypress="return soloNumeros(event)"/>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" arial-label="close" id='saveMaterialsProductItems' >
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
            Save changes
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

@section('_scripts2')
    <script type="text/javascript">

      $(document).ready(function(){
        var dataRows=$('#tblMaterial tbody tr');
        $(dataRows).each(
          function(){
            IdItemMaterialsProd+= 1;
          }
        );
      });

        // add item materials
        $('#saveMaterialsProductItems').on('click',function(){
          alert($('#tblMaterialItem'));
          var v_name=$('#txtMaterial');
          var v_nameMat=$(v_name).find(':selected').html();
          var v_quanty=$('#txtQuantityMat');
          var vd_table=$('#tblMaterialItem');
          console.log(vd_table);
          var ajaxResponse=document.getElementById('ajaxResponse');


          //insert with ajax
          $.ajaxSetup({
            headers:{
              'X-CSRF-Token': $('input[name="_token"]').val()
            }
          });

          //add items materials
          $.post('setAddInsertMaterial',{
            'IdItemMaterialsProd': IdItemMaterialsProd,
            'NomItemMaterialsProd': v_nameMat,
            'QuantItemMaterialsProd': $(v_quanty).val(),
          },function(data){
            $(ajaxResponse).append('ingreso ok '+data);
            v_contenido="<tr id="+IdItemMaterialsProd+">"+
            "<td>"+IdItemMaterialsProd+"</td>"+
            "<td>"+v_nameMat+"</td>"+
            "<td>"+$(v_quanty).val()+"</td>"+
            "<td> <div class='btn-group'>"
                +"<a href='#' class='btn delete' id='deletingMat' onclick='deleteItemMatRecipe("+IdItemMaterialsProd+")'></span></a>"
                +"</div> </td>"
                +"</tr>";
            $(vd_table).append(v_contenido);
            IdItemMaterialsProd++; //index table of materials
          });
        });

        //deleting items materials
        function deleteItemMatRecipe(v_IdDel){
          $.get('setDelMaterialsItems',{
            'IdItemDel':v_IdDel
          },function(data){
            $(ajaxResponse).append('delete '+data);
            $('#filaMat'+v_IdDel).remove();
            alert('Deliting Success');
          });
        }

    </script>

@endsection
