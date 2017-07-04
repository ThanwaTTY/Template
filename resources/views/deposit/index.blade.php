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

<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>  

{{-- datetimepicker --}}
    {{-- <script src="{{ asset('../../jquery/jquery-1.10.2.min.js') }}"></script> --}}
    <script src="{{ asset('../../jquery/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('../../jquery/jquery-ui-timepicker-addon.js') }}"></script>
    <script src="{{ asset('../../jquery/jquery-ui-sliderAccess.js') }}"></script>  


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
            Deposit
            </button>
            <br>
            <br>


            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>ชื่อ-สกุล</th>
                  <th>จำนวน</th>
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th>Action</th>
                  {{-- <th>Status</th>
                  <th>Reason</th> --}}
                </tr>
                @foreach($deposits as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->username }}</td>
                  <td>{{ $item->balance }}</td>
                  <td>{{ $item->bankdeposit }}</td>
                  <td>{{ $item->accountnumberdeposit }}</td>
                  <td>{{ $item->accontnamedeposit }}</td>
                  <td>
                    <form action="/user/{{ $item->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field ('DELETE') }}
                        <a href="/user/{{ $item->id }}/edit" class="btn btn-success">Edit</a>
                        <input class="btn btn-danger" type="submit" value="Delete"> 
                    </form>
                  
                  </td>
                  {{-- <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> --}}
                </tr>   
                @endforeach
              </table>
              <center>{{ $deposits->links() }}</center>
              
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
            <form class="form-horizontal" action="/deposit" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        
                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="Name" name="name" value="{{ auth()->user()->name }}">
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">จำนวนเงิน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="0" name="balance" value="{{ old('balance') }}">
                            <p style="color:red">{{ $errors->first('balance') }}</p>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">ธนาคารที่โอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="ธนาคารที่โอน" name="bankdeposit" value="{{ old('bankdeposit') }}">
                            <p style="color:red">{{ $errors->first('bankdeposit') }}</p>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">เลขบัญชีธนาคารที่โอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="เลขบัญชีธนาคารที่โอน" name="accountnumberdeposit" value="{{ old('accountnumberdeposit') }}">
                            <p style="color:red">{{ $errors->first('accountnumberdeposit') }}</p>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputname" class="col-sm-3 control-label">ชื่อบัญชีธนาคารที่โอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputname" placeholder="ชื่อบัญชีธนาคารที่โอน" name="accontnamedeposit" value="{{ old('accontnamedeposit') }}">
                            <p style="color:red">{{ $errors->first('accontnamedeposit') }}</p>
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="datetime" class="col-sm-3 control-label">วัน - เวลา ที่โอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="datetime" placeholder="" name="datetime" value="{{ old('datetime') }}">
                            <p style="color:red">{{ $errors->first('datetime') }}</p>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="channeldeposit" class="col-sm-3 control-label">ช่องทางการโอน</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="channeldeposit" placeholder="" name="channeldeposit" value="{{ old('channeldeposit') }}">
                            <p style="color:red">{{ $errors->first('channeldeposit') }}</p>
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="tel" class="col-sm-3 control-label">หมายเลขโทรศัพท์</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tel" placeholder="" name="tel" value="{{ old('tel') }}">
                            <p style="color:red">{{ $errors->first('tel') }}</p>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">ข้อเสนอแนะ</label>

                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" name="opinion" placeholder="">{{ old('opinion') }}</textarea>
                            <p style="color:red">{{ $errors->first('tel') }}</p>
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

    </div>
  </div>
</div>
@endsection