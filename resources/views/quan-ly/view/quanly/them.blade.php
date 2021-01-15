@extends('quan-ly.layout.master')
@section('title')
    Thêm quản lý
@endsection
@section('css')
<style>
        .select {
        border: none;
        border-bottom: 2px solid rgb(14, 218, 38);
        letter-spacing: 0.15em;
        border-radius: 10;
    }
    
    .themnhanvien {
        margin: auto;
    }
    
    .password{
        display: none;
        }
    .control-label{
        
        cursor: pointer;
    }
    input[type="email"],
    input[type="text"],
    input[type="tel"],
    input[type="file"],
    input[type="password"],
    input[type="number"] {
        border: none;
        border-bottom: 2px solid rgb(14, 218, 38);
    }
    
    input[type="radio"] {
        visibility: hidden;
    }
    
    .button {
        cursor: pointer;
    }
    
    .button.selected {
        background-color: rgba(12, 231, 38, 0.816);
        color: white;
    }
</style>
</head>

@endsection
@section('content')
<div class="col-lg-8 themnhanvien">
    @if (count($errors) > 0)
        @foreach ($errors->all() as $value)
            <div class="alert alert-danger">
                {{$value}}
            </div>
        @endforeach
    @endif
    @if (session('thongbaoimg'))
        <div class="alert alert-danger">
            {{session('thongbaoimg')}}
        </div>
    @endif
    @if (session('loi'))
    <div class="alert alert-danger">
        {{session('loi')}}
    </div>
@endif
 
<div class="mt-5">
    <h4 class="header-title mb-3">Thêm quản lý</h4>

    <form class="form-horizontal mt-3" action="{{url('quan-ly/them')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-md-3 control-label">Họ Tên</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="name" name='name' required placeholder="Nhập Họ Tên">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">
                <input type="email" class="form-control" id="email" name='email' required placeholder="Nhập Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-md-3 control-label">Số điện thoại</label>
            <div class="col-md-9">
                <input type="tel" class="form-control" id="phone" name='phone' required placeholder="Nhập Số điện thoại" >
            </div>
        </div>
        <div class="form-group row">
            <label for="QueQuan" class="col-md-3 control-label">Quê Quán</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="QueQuan" name='QueQuan' required placeholder="Nhập Quê quán" >
            </div>
        </div>
        <div class="form-group row">
            <label for="CMND" class="col-md-3 control-label">Chứng minh nhân dân hoặc thẻ căn cước</label>
            <div class="col-md-9">
                <input type="tel" class="form-control" id="CMND" name='CMND' required placeholder="Nhập Chứng minh nhân dân hoặc thẻ căn cước" >
            </div>
        </div>
        <div class="form-group row">
            <label for="avatar" class="col-md-3 control-label">Upload avatar</label>

            <div class="col-md-9">
                <input type="file" class="form-control" id="avatar" name="file">
            </div>
        </div>
            <div class="form-group row">
                <label for="passwordnew" class="col-md-3 control-label">Mật khẩu mới</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="passwordnew" required placeholder="Nhập mật khẩu mới" name='password'>
                </div>
            </div>
            <div class="form-group row">
                <label for="repassword" class="col-md-3 control-label">Nhập lại mật khẩu mới</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" required id="repassword" placeholder="Nhập lại mật khẩu mới" name='repassword'>
                </div>
            </div>
        <div class="form-group row justify-content-end">
            <label class="col-md-3 control-label">Chức vụ</label>
            <div class="col-md-9">
                <div class="checkbox-info">
                    <input id="radio1" type="radio" value="1" name="quyen">
                    <label class="btn btn-outline-info button"  id="pass" for="radio1">
                        Quản Lý
                    </label>
                    <input id="radio2" type="radio" value="2"name="quyen">
                    <label for="radio2" id="pass"  class="btn btn-outline-info button">
                        Tổ quản lý KTX
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row justify-content-end mb-0">
                <button class="col-md-12 btn btn-info" type="submit">Thêm</button>
        </div>
    </form>
</div>
</div>
@endsection

@section('script')
<script>
    $('.button').on('click', function() {
        $('.button').removeClass('selected');
        $(this).addClass('selected');
    });
</script>


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
@endsection