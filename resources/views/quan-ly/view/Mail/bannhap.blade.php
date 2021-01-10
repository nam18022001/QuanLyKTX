@extends('quan-ly.layout.master')
@section('title')
    Thư nháp
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
  thead th{
    font-size:14px;
    font-weight: 400;
    color: rgb(8, 66, 125);
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
            <h3 class="card-title">Bản nháp</h3>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-controls">
              <!-- Check all button -->
              <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
              </button>
              <div class="btn-group">
                <form action="{{url('quan-ly/thong-bao/xoa/ban-nhap')}}" method="POST" >
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
                <a href="{{url('quan-ly/thong-bao/ban-nhap')}}"><i class="fas fa-sync-alt"></i></a>
              </button>
              <div class="float-right">
                {{$nhap->firstItem()}} - {{$nhap->lastItem()}} / {{$nhap->total()}}
                <div class="btn-group">
                    @if ($nhap->currentPage() != 1)
                        <a href="{{$nhap->previousPageUrl()}}" class="btn btn-default btn-sm">
                            <i class="fas fa-chevron-left"></i>
                        </a> 
                        @else 
                        <span class="btn btn-default btn-sm hihi">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @endif
                  @if ($nhap->currentPage() != $nhap->lastPage())
                        <a href="{{$nhap->nextPageUrl()}}" class="btn btn-default btn-sm">
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
                <thead>
                  <tr>
                    <th></th>
                    <th>Người nhận</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th></th>
                    <th>Hoạt động</th>
                  </tr>
                </thead>
                <tbody>
                   @php
                       $i=1;
                   @endphp
                   @if ($nhap->total() != null)
                    @foreach ($nhap as $value)
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
                  <td class="mail-rateing">
                    {{$value->sinhvien->email}}
                </td>
                  <td class="mailbox-name clickable-row" data-href='{{url('quan-ly/thong-bao/sua-ban-nhap', $value->id)}}'><b>{{$value->tieude}}</b></td>
                  <td class="mailbox-subject clickable-row" data-href='{{url('quan-ly/thong-bao/sua-ban-nhap', $value->id)}}'><p>{{ $value->tomtat }}</p>
                  </td>
                  <td class="mailbox-attachment clickable-row" data-href='{{url('quan-ly/thong-bao/sua-ban-nhap', $value->id)}}'>
                    @php
                        $file = App\Models\ThongBaoFile::where('id_thongbaosv', $value->id)->get()->first();
                        if (!empty($file)) {
                          # code...
                          echo '<i class="fas fa-paperclip clickable-row" data-href="http://greendormitory.com/quan-ly/thong-bao/sua-ban-nhap",'. $value->id.'></i>';
                        } 
                    @endphp
                  </td>
                  <td class="mailbox-date clickable-row" data-href='{{url('quan-ly/thong-bao/thong-bao/sua-ban-nhap', $value->id)}}'>{{$value->created_at->diffForHumans()}}</td>
                
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
                {{$nhap->firstItem()}} - {{$nhap->lastItem()}} / {{$nhap->total()}}
                <div class="btn-group">
                    @if ($nhap->currentPage() != 1)
                        <a href="{{$nhap->previousPageUrl()}}" class="btn btn-default btn-sm">
                            <i class="fas fa-chevron-left"></i>
                        </a> 
                        @else 
                        <span class="btn btn-default btn-sm hihi">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @endif
                  @if ($nhap->currentPage() != $nhap->lastPage())
                        <a href="{{$nhap->nextPageUrl()}}" class="btn btn-default btn-sm">
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