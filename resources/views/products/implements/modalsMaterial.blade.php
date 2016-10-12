<div class="modal fade" id="myRegister" tabindex="-1" role="dialog" aria-labelledby="myRegister">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" id="form">
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
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-9">
              <select class="form-control" id="txtMaterial" name="txtMaterial"  required="true">
                @foreach ($datos['tblMaterial'] as $dat)
                  <option value="{{$dat['ID_MATERIAL']}}">{{$dat['NAME_MATERIALS']}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Quantity</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtQuantity" name="txtQuantity" placeholder="Quantity" onkeypress="return soloNumeros(event)"/>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Dimension</label>
            <div class="col-sm-9">
            <select class="form-control" id="txtDimension" name="txtDimension"  required="true">
              @foreach ($datos['tblDimension'] as $dat)
                <option value="{{$dat['ID_SPECIE']}}">{{$dat['NAME_SPECIE']}}</option>
              @endforeach
            </select>
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
