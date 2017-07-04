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

  {{-- datetimepicker --}}
    <link href="{{ asset('jquery/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('jquery/jquery-ui-timepicker-addon.css') }}" rel="stylesheet">

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


{{-- datetimepicker --}}
    <script src="{{ asset('../../jquery/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ asset('../../jquery/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('../../jquery/jquery-ui-timepicker-addon.js') }}"></script>
    <script src="{{ asset('../../jquery/jquery-ui-sliderAccess.js') }}"></script>
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>    

  <script type="text/javascript">

  $(function(){
  	$("#datetime").datetimepicker({
  		dateFormat: 'yy-mm-dd',
  		timeFormat: "HH:mm:ss"
  	});
  });

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
                <form class="form-horizontal" action="/deposit/" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        
                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="Name" name="name" value="{{ auth()->user()->name }}">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">จำนวนเงิน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="0" name="balance" value="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">ธนาคารที่โอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="ธนาคารที่โอน" name="bankdeposit" value="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">เลขบัญชีธนาคารที่โอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="เลขบัญชีธนาคารที่โอน" name="accountnumberdeposit" value="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">ชื่อบัญชีธนาคารที่โอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="ชื่อบัญชีธนาคารที่โอน" name="accontnamedeposit" value="">
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="datetime" class="col-sm-3 control-label">วัน - เวลา ที่โอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="datetime" placeholder="" name="datetime" value="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="channeldeposit" class="col-sm-3 control-label">ช่องทางการโอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="channeldeposit" placeholder="" name="channeldeposit" value="">
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="tel" class="col-sm-3 control-label">หมายเลขโทรศัพท์</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tel" placeholder="" name="tel" value="">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">ข้อเสนอแนะ</label>

                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" name="opinion" placeholder="">{{ old('opinion') }}</textarea>
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