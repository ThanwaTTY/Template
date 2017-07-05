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
            {{-- <button type="button" class="btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Deposit
            </button> --}}

            <a href="/withdraw/create" class="btn-sm btn-primary btn-lg">ถอนเงิน</a>
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
                @foreach($withdraws as $item)
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
              <center>{{ $withdraws->links() }}</center>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection