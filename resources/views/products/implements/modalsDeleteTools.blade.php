<!-- Delete -->
<div class="modal fade" id="myRegisterDel" tabindex="-1" role="dialog" aria-labelledby="myRegisterDel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="formDel" method="get">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Manager {{$tittle}}</h4>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to delete??</h4>
          {{csrf_field()}}
          <div class="form-group">            
            <div class="col-sm-9">
              <input type="hidden" class="form-control" id="txtCodeDel" name="txtCodeDel" readonly="true"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-9">
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
