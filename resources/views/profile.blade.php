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

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">แก้ไขข้อมูลส่วนตัว</h3>
            </div>
            <!-- /.box-header -->
			@if (session()->has('status'))
				<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Success!</h4>
	                {{ session('status') }}
              	</div>			
			@endif             
            <!-- form start -->
            <form role="form" method="post" action="/profile">
            	{{ csrf_field() }}
              <div class="box-body">
              	<div class="col-md-6">
	                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                  <label for="name">ชื่อ</label>
	                  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ auth()->user()->name }}">
				        @if ($errors->has('name'))
				            <span class="help-block">
				                <strong>{{ $errors->first('name') }}</strong>
				            </span>
				        @endif   	                  
	                </div>
	                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
	                  <label for="oldPassword">รหัสผ่านเดิม</label>
	                  <input type="password" class="form-control" id="oldPassword" placeholder="Old Password" name="old_password">
				        @if ($errors->has('old_password'))
				            <span class="help-block">
				                <strong>{{ $errors->first('old_password') }}</strong>
				            </span>
				        @endif   		                  
	                </div>
	                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                  <label for="newPassword">รหัสผ่านใหม่</label>
	                  <input type="password" class="form-control" id="newPassword" placeholder="New Password" name="password">
				        @if ($errors->has('password'))
				            <span class="help-block">
				                <strong>{{ $errors->first('password') }}</strong>
				            </span>
				        @endif   		                  
	                </div>
	                <div class="form-group">
	                  <label for="password_confirmation">ยืนยันรหัสผ่านใหม่</label>
	                  <input type="password" class="form-control" id="password_confirmation" placeholder="Retype Password" name="password_confirmation">
	                </div>
	              </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection