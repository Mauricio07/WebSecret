<article class="container" >
  <section class="row">
    <div class="panel-inbloom">
      <div class="col-sm-10">
        <h4>Materials </h4>
      </div>
      <div class="btn-group col-sm-2">
        <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myRegisterMaterial">Add </button>
        <button type="button" class="btn btn-default dropdown-toggle btn-md" onclick="displayTbl('divTblMaterial')">
          <span class="caret"></span>
        </button>
      </div>
    </div>
    <div class="tbl_hidden" id="divTblMaterial">
      <button type="button" name="button" onclick="addItemsTableRecipe('tblMaterial');">ok</button>
      <table class="table" id="tblMaterial">
        <thead>
          <th>Name</th>
          <th>Quantity</th>
          <th>Dimension</th>
          <th></th>
        </thead>
        <tbody>
          <tr>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</article>
