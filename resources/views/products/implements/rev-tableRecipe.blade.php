<article class="container">
  <section class="row">
    <div class="panel-inbloom">
      <div class="col-sm-10">
        <h4>Recipe</h4>
      </div>
      <div class="btn-group col-sm-2">
        <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myRegister">Add </button>
        <button type="button" class="btn btn-default dropdown-toggle btn-md" data-toggle="dropdown" onclick="displayTbl('divTblRecipe')">
          <span class="caret"></span>
        </button>
      </div>
    </div>
    <div class="tbl_hidden" id="divTblRecipe">
      <table class="table" id="tblRecipe" name='tblRecipe'>
        <thead>
          <th></th>
          <th>Specie</th>
          <th>Color</th>
          <th>Process</th>
          <th>Types</th>
          <th>Cuts</th>
          <th>Grade</th>
          <th>Quantity</th>
          <th></th>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </section>
</article>
