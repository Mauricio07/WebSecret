<!-- frm de items Variety-->
<div class="modal fade" tabindex="-1" role="dialog" id="myVariety">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Manager Varieties</h4>
      </div>
      <div class="modal-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#homeVariety" aria-controls="home" role="tab" data-toggle="tab">Report</a></li>
          <li role="presentation"><a href="#insertVariety" aria-controls="insert" role="tab" data-toggle="tab">Insert</a></li>
          <li role="presentation"><a href="#modifyVariety" aria-controls="modify" role="tab" data-toggle="tab">Modify</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="homeVariety">

            <table id="tblVariety" class="table table-striped">
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Date</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($vDatosTbl['tblVariety'] as $vItem)
                  <tr>
                    <td>{{$vItem->ID_VARIETY}}</td> <td>{{$vItem->NAME_VARIETY}}</td> <td>{{$vItem->DATE_VARIETY}}</td>
                    <td>
                      <a href="#modifyVariety" onclick="modificarVariety({{$vItem->ID_VARIETY}},'{{$vItem->NAME_VARIETY}}')" aria-controls="modify" role="tab" data-toggle="tab">
                        <span class="modifi"></span>
                      </a>
                    </td>

                    <td>
                      <a href="{{url('getDeleteVariety/')}}/{{$vItem->ID_VARIETY}}">
                        <span class="delete"></span>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div role="tabpanel" class="tab-pane" id="insertVariety">
            <form action="setInsertVariety" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="nameVariety" placeholder="Enter name">
              </div>
              <div class="">
                <hr/>
              </div>
              <div class="container">
                <button class="btn btn-inbloom" type="submit">Save</button>
              </div>
            </form>
          </div>

          <div role="tabpanel" class="tab-pane" id="modifyVariety">
            <form action="setModificationVariety" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="idcodVariety" name="idcodVariety" hidden="true"/>
                <input type="text" class="form-control" id="txtModificaVariety" name="nameVariety" placeholder="Enter name"/>
              </div>

              <div class="container"> <hr/> </div>

              <div class="container">
                <button class="btn btn-inbloom" type="submit" >Change</button>
              </div>
            </form>
          </div>
        </div>


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
