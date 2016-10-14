<article class="container">
  <section class="row">
    <div class="panel-inbloom">
      <div class="col-sm-10">
        <h4>Recipe</h4>
      </div>
      <div class="btn-group col-sm-2">
        <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myRegister">Add </button>
        <button type="button" class="btn btn-default dropdown-toggle btn-md" data-toggle="dropdown" onclick="displayTbl('tblRecipe')">
          <span class="caret"></span>
        </button>
      </div>
    </div>
    <div class="tbl_hidden" id="tblRecipe">
      <table class="table">
        <thead>
          <th>Name</th>
          <th>Quantity</th>
          <th>Dimension</th>
          <th></th>
        </thead>
        <tbody>
          <tr>
            <td>aaaaaa</td><td>aa</td><td>12x45x55</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs">Action </button>
                <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>

                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" data-toggle="modal" data-target="#myRegister" onclick="setRegistros('','','setModificationColor')">Edit</a></li>
                  <li class="divider"></li>
                  <li><a href="#" data-toggle="modal" data-target="#myRegisterDel" onclick="setRegistrosDel('','','getDeleteColor')">Delete</a></li>
                </ul>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</article>
