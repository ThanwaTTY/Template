@extends('form')
@section('head')
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- Tell the browser to be responsive to screen width -->


  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
@endsection
@section('footer')
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>    
@endsection

@section('content')
  
    {{-- <section class="content-header">
      <h1>
        User Data Tables
        <small>preview of user data tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section> --}}

    <!-- Main content -->
    <section class="content">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <button type="button" class="btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            New User
            </button>
            <br>
            <br>


            <div class="box-body table-responsive no-padding">
                {{-- <div class="content">dd</div> --}}
                    <table class="table table-hover">
                        <tr>
                        {{-- <th>#</th> --}}
                        <th>User</th>
                        <th>Message</th>
                        <th>Log Time</th>
                        {{-- <th>More Info</th> --}}
                        {{-- <th>Status</th>
                        <th>Reason</th> --}}
                        </tr>
                        @foreach($ActivityLogs as $item)
                                        <tr>
                        {{-- <td>{{ $item->id }}</td> --}}
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->message }}</td>
                        <td>{{ $item->created_at }}</td>
                        {{-- <td>{{ $item->updated_at }}</td> --}}
                        {{-- <td>
                                <a href="/Activity_log/{{ $item->id }}/show" class="btn btn-info">...</a>
                        </td> --}}
                        {{-- <td><span class="label label-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> --}}
                        </tr>   
                        @endforeach
                    </table>
                        <center>{{ $ActivityLogs->appends(['gender'=>request('gender')])->links() }}</center>
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       

                <div class="box box-info">
            {{-- <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div> --}}
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="/adduser" method="post">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Name" name="name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputRetypepassword" class="col-sm-2 control-label">Retype password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputRetypepassword" placeholder="Retype password" name="retype_password">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Save</button>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
              </div>
              <!-- /.box-footer -->
            </form>
          </div>


      </div>

    </div>
  </div>
</div>
@endsection