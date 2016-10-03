<!-- frm de items Type-->
<div class="modal fade" tabindex="-1" role="dialog" id="myPresentation">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Manager Presentation</h4>
      </div>
      <div class="modal-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#homePresentation" aria-controls="home" role="tab" data-toggle="tab">Report</a></li>
          <li role="presentation"><a href="#insertPresentation" aria-controls="insert" role="tab" data-toggle="tab">Insert</a></li>
          <li role="presentation"><a href="#modifyPresentation" aria-controls="modify" role="tab" data-toggle="tab">Modify</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="homePresentation">

            <table id="tblPresentation" class="table table-striped">
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Date</th>
                <th></th>
                <th></th>
              </thead>
              <tbody>
                @foreach ($vDatosTbl['tblPresentation'] as $vItem)
                  <tr>
                    <td>{{$vItem->ID_PTYPE}}</td> <td>{{$vItem->NAME_PTYPE}}</td> <td>{{$vItem->DATE_PTYPES}}</td>
                    <td>
                      <a href="#modifyPresentation" onclick="modificarPresentation({{$vItem->ID_PTYPE}},'{{$vItem->NAME_PTYPE}}')" aria-controls="modify" role="tab" data-toggle="tab">
                        <span class="modifi"></span>
                      </a>
                    </td>

                    <td>
                      <a href="{{url('getDeletePresentation/')}}/{{$vItem->ID_PTYPE}}">
                        <span class="delete"></span>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div role="tabpanel" class="tab-pane" id="insertPresentation">
            <form action="setInsertPresentation" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="namePresentation" placeholder="Enter name">
              </div>
              <div class="">
                <hr/>
              </div>
              <div class="container">
                <button class="btn btn-inbloom" type="submit">Save</button>
              </div>
            </form>
          </div>

          <div role="tabpanel" class="tab-pane" id="modifyPresentation">
            <form action="setModificationPresentation" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="idcodPresentation" name="idcodPresentation" hidden="true"/>
                <input type="text" class="form-control" id="txtModificaPresentation" name="namePresentation" placeholder="Enter name"/>
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
