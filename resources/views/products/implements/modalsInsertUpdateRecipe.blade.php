<div class="modal fade" id="myRegister" tabindex="-1" role="dialog" aria-labelledby="myRegister">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form class="form-horizontal" id="formRecipe" action="post">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Manager {{$tittle}}</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Specie</label>
              <div class="col-sm-4">
              <select class="form-control" id="txtSpecie" name="txtSpecie"  required="true">
                @foreach ($datos['tblSpecie'] as $dat)
                  <option value="{{$dat['ID_SPECIE']}}">{{$dat['NAME_SPECIE']}}</option>
                @endforeach
              </select>
            </div>

            <label class="col-sm-2 control-label">Color</label>
            <div class="col-sm-4">
              <select class="form-control" id="txtColor" name="txtColor" required="true">
                @foreach ($datos['tblColor'] as $dat)
                  <option value="{{$dat['ID_COLOR']}}">{{$dat['NAME_COLOR']}}</option>
                @endforeach
              </select>
             </div>
            </div>


            <div class="form-group">
               <label class="col-sm-2 control-label">Process</label>
               <div class="col-sm-4">
                 <select class="form-control" id="txtProcess" name="txtProcess"  required="true">
                   @foreach ($datos['tblProcess'] as $dat)
                     <option value="{{$dat['ID_PROCESS']}}">{{$dat['TYPE_PROCESS']}}</option>
                   @endforeach
                 </select>
               </div>
               <label class="col-sm-2 control-label">Types</label>
               <div class="col-sm-4">
                 <select class="form-control" id="txtType" name="txtType" required="true">
                   @foreach ($datos['tblType'] as $dat)
                     <option value="{{$dat['ID_ITYPES']}}">{{$dat['NAME_ITYPES']}}</option>
                   @endforeach
                 </select>
               </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Cuts</label>
              <div class="col-sm-4">
              <select class="form-control" id="txtCut" name="txtCut" required="true">
                @foreach ($datos['tblCut'] as $dat)
                  <option value="{{$dat['ID_CUT']}}">{{$dat['NAME_CUT']}}</option>
                @endforeach
              </select>
            </div>

            <label class="col-sm-2 control-label">Grade</label>
            <div class="col-sm-4">
              <select class="form-control" id="txtGrade" name="txtGrade"  required="true">
                @foreach ($datos['tblGrade'] as $dat)
                  <option value="{{$dat['ID_GRADE']}}">{{$dat['NAME_GRADE']}}</option>
                @endforeach
              </select>
              <input type="text" name="txtCodeRecipe" id="txtCodeRecipe" hidden="true"/>
            </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Quantity</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" id="txtQuantity" name="txtQuantity" required="true" onkeypress="return soloNumeros(event)"/>
        </div>
      </div>

      </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" aria-label="Close" id="saveRecipe"  class="btn btn-default" onclick="setAddRecipe('setDelRecipeItems')">
              <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
              Save changes
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
