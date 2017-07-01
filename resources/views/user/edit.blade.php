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
<section class="content">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="box box-info">
                {{-- <div class="box-header with-border">
                <h3 class="box-title">Horizontal Form</h3>
                </div> --}}
                <!-- /.box-header -->
                <!-- form start -->
                <br>
                <form class="form-horizontal" action="/user/{{ $users->id }}" method="post">
                    {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="{{ $users->name }}">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{ $users->email }}">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputPassword3" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="inputRetypepassword" class="col-sm-3 control-label">Retype password</label>

                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="inputRetypepassword" placeholder="Retype password" name="retype_password">
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
             
            </div>
            <!-- /.modal-content -->
        </div>
</section>

@endsection