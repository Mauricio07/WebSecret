<!-- Modal -->
<div class="modal fade" id="myRegisterMaterialRecipe" tabindex="-1" role="dialog" aria-labelledby="myRegisterMaterialRecipe">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Details of Recipe Materials</h4>
      </div>
      <div class="modal-body">
        <form class="" action="setDelItemsMaterialsRecipe" method="get">
        <table class="table table-striped" id="tblDatosMaterialsRecipe">
          <thead>
            <th> Materials </th>
            <th> Quantity </th>
            <th> </th>
          </thead>
            <tbody id="tblItemsRecipesBody">
            </tbody>
        </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
