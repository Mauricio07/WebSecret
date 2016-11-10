<!-- Edition -->
<div class="modal fade" id="myRegisterEdit" tabindex="-1" role="dialog" aria-labelledby="myRegisterEdit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="formEdit" method="post">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Manager {{$tittle}}</h4>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to edit??</h4>
          {{csrf_field()}}
          <div class="form-group">
            <label class="col-sm-2 control-label">Code</label>
            <div class="col-sm-9">
              <input type="hidden" class="form-control" id="txtidEdit" name="txtidEdit"/>
              <input type="text" class="form-control" id="txtCodeEdit" name="txtCodeEdit" readonly="true"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txtNameEdit" name="txtNameEdit" readonly="true"/>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">  Yes </button>
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">  No </button>
      </div>
      </form>
    </div>
  </div>
</div>
