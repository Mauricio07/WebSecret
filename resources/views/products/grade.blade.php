<!-- frm de items Grade-->
<div class="modal fade" tabindex="-1" role="dialog" id="myGrade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Manager Grade</h4>
      </div>
      <div class="modal-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#homeGrade" aria-controls="home" role="tab" data-toggle="tab">Report</a></li>
          <li role="presentation"><a href="#insertGrade" aria-controls="insert" role="tab" data-toggle="tab">Insert</a></li>
          <li role="presentation"><a href="#modifyGrade" aria-controls="modify" role="tab" data-toggle="tab">Modify</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="homeGrade">

            <table id="tblGrade" class="table table-striped">
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Date</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($vDatosTbl['tblGrade'] as $vItem)
                  <tr>
                    <td>{{$vItem->ID_GRADE}}</td> <td>{{$vItem->NAME_GRADE}}</td> <td>{{$vItem->DATE_GRADE}}</td>
                    <td>
                      <a href="#modifyGrade" onclick="modificarGrade({{$vItem->ID_GRADE}},'{{$vItem->NAME_GRADE}}')" aria-controls="modify" role="tab" data-toggle="tab">
                        <span class="modifi"></span>
                      </a>
                    </td>

                    <td>
                      <a href="{{url('getDeleteGrade/')}}/{{$vItem->ID_GRADE}}">
                        <span class="delete"></span>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div role="tabpanel" class="tab-pane" id="insertGrade">
            <form action="setInsertGrade" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="nameGrade" placeholder="Enter name">
              </div>
              <div class="">
                <hr/>
              </div>
              <div class="container">
                <button class="btn btn-inbloom" type="submit">Save</button>
              </div>
            </form>
          </div>

          <div role="tabpanel" class="tab-pane" id="modifyGrade">
            <form action="setModificationGrade" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="idcodGrade" name="idcodGrade" hidden="true"/>
                <input type="text" class="form-control" id="txtModificaGrade" name="nameGrade" placeholder="Enter name"/>
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
