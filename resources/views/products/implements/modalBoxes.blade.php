<div class="modal fade" id="myModalBoxes" tabindex="-1" role="dialog" aria-labelledby="myModalBoxes">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" id="formBoxes">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Manager {{$tittle}}</h4>
      </div>
      <div class="modal-body">
          {{csrf_field()}}
          <div class="form-group" hidden="true">
            <label class="col-sm-2 control-label">Id</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtCode" name="txtCode" placeholder="Code"/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Type</label>
            <div class="col-sm-4">
              <select class="form-control" id="txtType" name="txtType" required="true">
                @foreach ($datos['tblTypes'] as $dat)
                  <option value="{{$dat->ID_BTYPE}}">{{$dat->TYPEBOXE_BTYPE}}</option>
                @endforeach
              </select>
            </div>

            <label class="col-sm-2 control-label">Length</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="txtLength" name="txtLength" placeholder="Length" onkeypress="return soloNumeros(event)" required="true"/>
            </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Width</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="txtWidth" name="txtWidth" placeholder="Width" onkeypress="return soloNumeros(event)" required="true"/>
          </div>

        <label class="col-sm-2 control-label">Height</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="txtHeight" name="txtHeight" placeholder="Height" onkeypress="return soloNumeros(event)" required="true"/>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Weigth(Lb)</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="txtWeigth" name="txtWeigth" placeholder="Weigth" onkeypress="return soloNumeros(event)" required="true"/>
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
