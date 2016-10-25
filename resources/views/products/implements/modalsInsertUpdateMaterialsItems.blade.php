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
              <input type="text" class="form-control" id="txtIdRow" name="txtIdRow" hidden="true"/>
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
              <input type="text" class="form-control" id="txtQuantityMatRecipe" name="txtQuantityMatRecipe" placeholder="Quantity" autocomplete="off" onkeypress="return soloNumeros(event)"/>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" arial-label="close" id='saveMaterialsProductItems' onclick="saveMaterialRecipe('setAddInsertMaterialsRecipe','setDelMaterialsRecipe')">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
            Save changes
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
