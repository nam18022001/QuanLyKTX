@extends('quan-ly.layout.master') 
@section('title')
    Thùng rác
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
@if (session('update'))
        <div class="alert alert-success">
            {{session('update')}}
        </div>
@endif
<div class="alert alert-primary">Hộp thư sẽ tự động xóa sau 30 ngày</div>
<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Thùng rác</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm">
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
                <form action="{{url('quan-ly/thong-bao/thung-rac/xoa')}}" method="POST" >
                    {{ csrf_field() }}
                <button type="submit"  name="delete" value="delete" class="btn btn-default btn-sm">  
                  <i class="far fa-trash-alt"></i>
                </button>
                <button type="submit" name="update" value="update" class="btn btn-default btn-sm">  
                    <i class="fas fa-trash-restore"></i>
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
                <a href="{{url('quan-ly/thong-bao/thung-rac')}}"><i class="fas fa-sync-alt"></i></a>
              </button>
              <div class="float-right">
                {{$trash->firstItem()}} - {{$trash->lastItem()}} / {{$trash->total()}}
                <div class="btn-group">
                    @if ($trash->currentPage() != 1)
                        <a href="{{$trash->previousPageUrl()}}" class="btn btn-default btn-sm">
                            <i class="fas fa-chevron-left"></i>
                        </a> 
                        @else 
                        <span class="btn btn-default btn-sm hihi">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @endif
                  @if ($trash->currentPage() != $trash->lastPage())
                        <a href="{{$trash->nextPageUrl()}}" class="btn btn-default btn-sm">
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
                    <th>Người gửi</th>
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
                    @if ($trash->total() != null)
                    @foreach ($trash as $value)
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
                  <td class="mailbox-name clickable-row" ><b>{{$value->tieude}}</b></td>
                  <td class="mailbox-subject clickable-row"><p>{{ $value->tomtat }}</p>
                  </td>
                  <td class="mailbox-attachment clickable-row">
                    @php
                        $file = App\Models\ThongBaoFile::where('id_thongbaosv', $value->id)->get()->first();
                        if (!empty($file)) {
                          # code...
                          echo '<i class="fas fa-paperclip clickable-row"></i>';
                        } 
                    @endphp
                  </td>
                  <td class="mailbox-date clickable-row">{{$value->created_at->diffForHumans()}}</td>
                
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
                {{$trash->firstItem()}} - {{$trash->lastItem()}} / {{$trash->total()}}
                <div class="btn-group">
                    @if ($trash->currentPage() != 1)
                        <a href="{{$trash->previousPageUrl()}}" class="btn btn-default btn-sm">
                            <i class="fas fa-chevron-left"></i>
                        </a> 
                        @else 
                        <span class="btn btn-default btn-sm hihi">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @endif
                  @if ($trash->currentPage() != $trash->lastPage())
                        <a href="{{$trash->nextPageUrl()}}" class="btn btn-default btn-sm">
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