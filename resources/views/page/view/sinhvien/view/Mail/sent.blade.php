@extends('page.view.sinhvien.layout.master')
@section('title')
    Thư đã gửi
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<style>
    .hihi{
        cursor: default;
        pointer-events: none;
        background-color: rgb(186, 170, 170);
    }
  tr{
    cursor: pointer;
    pointer-events: auto;
  }
  p{

overflow: hidden;
width: 350px;
text-overflow: ellipsis;
white-space: nowrap; 
}
</style>
@endsection
@section('content')
@if (session('loi'))
        <div class="alert alert-danger">
            {{session('loi')}}
        </div>
@endif
@if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
@endif
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Thư đã gửi</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" id="search" name="search" placeholder="Tìm kiếm thư">
                <div class="input-group-append">
                  <div class="btn btn-primary">
                    <i class="fas fa-search" style="color: white;"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-controls">
              <!-- Check all button -->
              <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
              </button>
              <div class="btn-group">
                <form action="{{url('thong-bao/xoa/tin-da-gui')}}" method="POST" >
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-default btn-sm">  
                  <i class="far fa-trash-alt"></i>
                </button>
                {{-- <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-reply"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-share"></i>
                </button> --}}
              </div>
              <!-- /.btn-group -->
              <button type="button" class="btn btn-default btn-sm">
                <a href="{{url('thong-bao/da-gui')}}"><i class="fas fa-sync-alt"></i></a>
              </button>
              <div class="float-right">
                {{$sent->firstItem()}} - {{$sent->lastItem()}} / {{$sent->total()}}
                <div class="btn-group">
                    @if ($sent->currentPage() != 1)
                        <a href="{{$sent->previousPageUrl()}}" class="btn btn-default btn-sm">
                            <i class="fas fa-chevron-left"></i>
                        </a> 
                        @else 
                        <span class="btn btn-default btn-sm hihi">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @endif
                  @if ($sent->currentPage() != $sent->lastPage())
                        <a href="{{$sent->nextPageUrl()}}" class="btn btn-default btn-sm">
                            <i class="fas fa-chevron-right"></i>
                        </a>  
                        @else 
                        <span class="btn btn-default btn-sm hihi">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                  @endif
                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.float-right -->
            </div>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover">
                <tbody>
                   @php
                       $i=1;
                   @endphp
                   @if ($sent->total() != null)
                    @foreach ($sent as $value)
                    @php
                    
                    $u = $i++;
                @endphp
                <tr>
                 
                  <td>
                    <div class="icheck-primary">
                      <input type="checkbox" name="checked[]" value="{{$value->id}}" id="check{{$u}}">
                      <label for="check{{$u}}"></label>
                    </div>
                  </td>
                  <td class="mailbox-name clickable-row" data-href='{{url('thong-bao/mail/da-gui', $value->id)}}'><b>{{$value->tieude}}</b></td>
                  <td class="mailbox-subject clickable-row" data-href='{{url('thong-bao/mail/da-gui', $value->id)}}'><p>{{ $value->tomtat }}</p>
                  </td>
                  <td class="mailbox-attachment clickable-row" data-href='{{url('thong-bao/mail/da-gui', $value->id)}}'>
                    @php
                        $file = App\Models\ThongBaoFile::where('id_thongbao', $value->id)->get()->first();
                        if (!empty($file)) {
                          # code...
                          echo '<i class="fas fa-paperclip clickable-row" data-href="'.url('thong-bao/mail/da-gui').'",'. $value->id.'></i>';
                        } 
                    @endphp
                  </td>
                  <td class="mailbox-date clickable-row" data-href='{{url('thong-bao/mail/da-gui', $value->id)}}'>{{$value->created_at->diffForHumans()}}</td>
                
                </tr>
                @endforeach
                @else 
                <tr>
                    <td class="mailbox-subject text-center">Trống rỗng</td>
                </tr>    
                  @endif
                </tbody>
              </table>
              </form>
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer p-0">
            <div class="mailbox-controls">
              <div class="float-right">
                {{$sent->firstItem()}} - {{$sent->lastItem()}} / {{$sent->total()}}
                <div class="btn-group">
                    @if ($sent->currentPage() != 1)
                        <a href="{{$sent->previousPageUrl()}}" class="btn btn-default btn-sm">
                            <i class="fas fa-chevron-left"></i>
                        </a> 
                        @else 
                        <span class="btn btn-default btn-sm hihi">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @endif
                  @if ($sent->currentPage() != $sent->lastPage())
                        <a href="{{$sent->nextPageUrl()}}" class="btn btn-default btn-sm">
                            <i class="fas fa-chevron-right"></i>
                        </a>  
                        @else 
                        <span class="btn btn-default btn-sm hihi">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                  @endif
                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.float-right -->
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@endsection

@section('script')
<script src="{{url('dist/js/demo.js')}}"></script>
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<script>
//   window.setInterval(function ()
// {
    
// }, 3000);
</script>
<script>
  
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
<script>
    $('#search').on('keyup', function(){
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: 'http://greendormitory.com/thong-bao/tin-da-gui/tim-kiem',
            data:{
                'search' : $value
            }, 
            success: function(data){
                $('tbody').html(data);
                
            },
            
        });
    });
</script>

<script>
    $(function () {
      //Enable check and uncheck all functionality
      $('.checkbox-toggle').click(function () {
        var clicks = $(this).data('clicks')
        if (clicks) {
          //Uncheck all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
          $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
        } else {
          //Check all checkboxes
          $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
          $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
        }
        $(this).data('clicks', !clicks)
      })
  
      //Handle starring for font awesome
      $('.mailbox-star').click(function (e) {
        e.preventDefault()
        //detect type
        var $this = $(this).find('a > i')
        var fa    = $this.hasClass('fa')
  
        //Switch states
        if (fa) {
          $this.toggleClass('fa-star')
          $this.toggleClass('fa-star-o')
        }
      })
    })
  </script>
@endsection