<!-- frm de items Color-->
<div class="modal fade" tabindex="-1" role="dialog" id="myColor">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Manager Color</h4>
      </div>
      <div class="modal-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#homeColor" aria-controls="home" role="tab" data-toggle="tab">Report</a></li>
          <li role="presentation"><a href="#insertColor" aria-controls="insert" role="tab" data-toggle="tab">Insert</a></li>
          <li role="presentation"><a href="#modifyColor" aria-controls="modify" role="tab" data-toggle="tab">Modify</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="homeColor">

            <table id="tblColor" class="table table-striped">
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Date</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($vDatosTbl['tblColor'] as $vItem)
                  <tr>
                    <td>{{$vItem->ID_COLOR}}</td> <td>{{$vItem->NAME_COLOR}}</td> <td>{{$vItem->DATE_COLOR}}</td>
                    <td>
                      <a href="#modifyColor" onclick="modificarColor({{$vItem->ID_COLOR}},'{{$vItem->NAME_COLOR}}')" aria-controls="modify" role="tab" data-toggle="tab">
                        <span class="modifi"></span>
                      </a>
                    </td>

                    <td>
                      <a href="{{url('getDeleteColor/')}}/{{$vItem->ID_COLOR}}">
                        <span class="delete"></span>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div role="tabpanel" class="tab-pane" id="insertColor">
            <form action="setInsertColor" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="nameColor" placeholder="Enter name">
              </div>
              <div class="">
                <hr/>
              </div>
              <div class="container">
                <button class="btn btn-inbloom" type="submit">Save</button>
              </div>
            </form>
          </div>

          <div role="tabpanel" class="tab-pane" id="modifyColor">
            <form action="setModificationColor" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="idcodColor" name="idcodColor" hidden="true"/>
                <input type="text" class="form-control" id="txtModificaColor" name="nameColor" placeholder="Enter name"/>
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
