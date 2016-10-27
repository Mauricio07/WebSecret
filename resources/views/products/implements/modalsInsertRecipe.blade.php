<div class="modal fade" id="myRegisterRecipe" tabindex="-1" role="dialog" aria-labelledby="myRegisterRecipe">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" id="formRecipe">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Recipes</h4>
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
            <label class="col-sm-2 control-label">Presentation</label>
            <div class="col-sm-8">
              <select class="form-control" id="txtPresentation" name="txtPresentation"  required="true">
                @foreach ($datos['tblPresentation'] as $dat)
                  <option value="{{$dat['ID_PTYPE']}}">{{$dat['NAME_PTYPE']}}</option>
                @endforeach
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick="setAddRecipe()">
            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
            Save changes
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
