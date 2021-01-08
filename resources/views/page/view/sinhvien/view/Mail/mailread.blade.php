@extends('page.view.sinhvien.layout.master')
@section('title')
{{$thongbao->tieude}} - {{Auth::guard('sinh_vien')->user()->email}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
  .filename{
    overflow: hidden;
    /* width: 100px; */
    text-overflow: ellipsis;
    white-space: nowrap; 
  }
</style>
@endsection
@section('content')
<div class="mail-box">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>

        <div class="box-tools pull-right">
          <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i></a>
          <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Next"><i class="fa fa-chevron-right"></i></a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <div class="mailbox-read-info">
          <h3>{{$thongbao->tieude}}</h3>
          <h5>Từ: tôi &lt;{{Auth::guard('sinh_vien')->user()->email}}&gt;
            <span class="mailbox-read-time pull-right">{{$thongbao->created_at->isoFormat('dddd\\, \\n\\g\\à\\y D\\, MMMM\\, YYYY \\| H:mm:ss')}}</span></h5>
        </div>
        <!-- /.mailbox-read-info -->
        <div class="mailbox-controls with-border text-center">
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Delete">
                <i class="far fa-trash-alt"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Reply">
              <i class="fa fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Forward">
              <i class="fa fa-share"></i></button>
          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" data-original-title="Print">
            <i class="fa fa-print"></i></button>
        </div>
        <!-- /.mailbox-controls -->
        <div class="mailbox-read-message mailbox-controls with-border">
          {!! $thongbao->noidung !!}
        </div>
        <!-- /.mailbox-read-message -->
      </div><br>
      <!-- /.box-body -->
      <div class="box-footer">
        <ul class="mailbox-attachments clearfix">
          @foreach ($file as $value)
          <li>
            <span class="mailbox-attachment-icon"><i class="fas fa-file"></i></span>

            <div class="mailbox-attachment-info">
              <a href="#" class="mailbox-attachment-name"><p class="filename"><i class="fa fa-paperclip"></i> {{ $value->filename }}</p></a>
                  <span class="mailbox-attachment-size">
                    
                    <a href="{{url('thong-bao/file-download', $value->id)}}" class="btn btn-default btn-xs"><i class="fas fa-download"></i></a>
                  </span>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
      <!-- /.box-footer -->
      <div class="box-footer">
        <div class="pull-right">
          <button type="button" class="btn btn-default"><i class="fa fa-trash-alt"></i> Xóa</button>
          <button type="button" class="btn btn-default"><i class="fa fa-print"></i> In</button>
        </div>
        </div>
      <!-- /.box-footer -->
    </div>
    <!-- /. box -->
  </div>
  
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