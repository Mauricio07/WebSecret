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
            </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Quantity</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" id="txtQuantity" name="txtQuantity" required="true" onkeypress="return soloNumeros(event)" />
        </div>

      </div>

      </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" aria-label="Close" id="saveRecipe"  class="btn btn-default">
              <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
              Save changes
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

@section('_scripts')
    <script type="text/javascript">
    $('#saveRecipe').on('click',function(){
      var vd_form=$('#formRecipe');
      var v_nSpecie=$('#txtSpecie');
      var v_nColor=$('#txtColor');
      var v_nProcess=$('#txtProcess');
      var v_nType=$('#txtType');
      var v_nCut=$('#txtCut');
      var v_nGrade=$('#txtGrade');
      var v_quanty=$('#txtQuantity');
      var ajaxRecipe=document.getElementById('ajaxRecipe');

      var vd_table=document.getElementById('tblRecipe');   //nombre table
      var v_contenido="<tr>"+
      "<td><a href='#'>+</a></td>"+
      "<td>"+$(v_nSpecie).find(':selected').html()+"</td>"+
      "<td>"+$(v_nColor).find(':selected').html()+"</td>"+
      "<td>"+$(v_nProcess).find(':selected').html()+"</td>"+
      "<td>"+$(v_nType).find(':selected').html()+"</td>"+
      "<td>"+$(v_nCut).find(':selected').html()+"</td>"+
      "<td>"+$(v_nGrade).find(':selected').html()+"</td>"+
      "<td>"+$(v_quanty).val()+"</td>"+
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

      //insert with ajax
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.post('setAddInsertRecipe',{
        'IdSpecie':$(v_nSpecie).val(),
        'IdColor':$(v_nColor).val(),
        'IdProcess':$(v_nProcess).val(),
        'IdTypes':$(v_nType).val(),
        'IdCuts':$(v_nCut).val(),
        'IdGrade':$(v_nGrade).val(),
        'Quantity':$(v_quanty).val(),
      },function(data){
        console.log(data);
        $(ajaxRecipe).append(data);
      });
    });
    </script>
@endsection
