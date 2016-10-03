<!-- frm de items Cut-->
<div class="modal fade" tabindex="-1" role="dialog" id="myCut">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Manager Cut</h4>
      </div>
      <div class="modal-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#homeCut" aria-controls="home" role="tab" data-toggle="tab">Report</a></li>
          <li role="presentation"><a href="#insertCut" aria-controls="insert" role="tab" data-toggle="tab">Insert</a></li>
          <li role="presentation"><a href="#modifyCut" aria-controls="modify" role="tab" data-toggle="tab">Modify</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="homeCut">

            <table id="tblCut" class="table table-striped">
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Date</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($vDatosTbl['tblCut'] as $vItem)
                  <tr>
                    <td>{{$vItem->ID_CUT}}</td> <td>{{$vItem->NAME_CUT}}</td> <td>{{$vItem->DATE_CUT}}</td>
                    <td>
                      <a href="#modifyCut" onclick="modificarCut({{$vItem->ID_CUT}},'{{$vItem->NAME_CUT}}')" aria-controls="modify" role="tab" data-toggle="tab">
                        <span class="modifi"></span>
                      </a>
                    </td>

                    <td>
                      <a href="{{url('getDeleteCut/')}}/{{$vItem->ID_CUT}}">
                        <span class="delete"></span>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div role="tabpanel" class="tab-pane" id="insertCut">
            <form action="setInsertCut" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="nameCut" placeholder="Enter name">
              </div>
              <div class="">
                <hr/>
              </div>
              <div class="container">
                <button class="btn btn-inbloom" type="submit">Save</button>
              </div>
            </form>
          </div>

          <div role="tabpanel" class="tab-pane" id="modifyCut">
            <form action="setModificationCut" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="idcodCut" name="idcodCut" hidden="true"/>
                <input type="text" class="form-control" id="txtModificaCut" name="nameCut" placeholder="Enter name"/>
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
