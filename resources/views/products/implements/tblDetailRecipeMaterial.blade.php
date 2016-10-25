<!-- Modal -->
<div class="modal fade" id="myRegisterMaterialRecipe" tabindex="-1" role="dialog" aria-labelledby="myRegisterMaterialRecipe">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Details materials recipe</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <thead>
            <th> Materials </th>
            <th> Quantity </th>
            <th> </th>
          </thead>
          <tbody>
            @if (Session::get('ProductMaterialsRecipe'))
              @foreach (Session::get('ProductMaterialsRecipe') as $datoMatRecipe)
                <tr>
                  <td>{{$datoMatRecipe['IdItemRecipe']}}</td>
                  <td>{{$datoMatRecipe['NomItemMaterialsRecipe']}}</td>
                  <td>{{$datoMatRecipe['QuantItemMaterialsRecipe']}}</td>                  
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
