@extends('quan-ly.layout.master')
@section('title')
    Sửa sinh viên
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
 
<div class="mt-5">
    <h4 class="header-title mb-3">Sửa sinh viên {{$sinhvien->Ten}}</h4>

    <form class="form-horizontal mt-3" action="{{url('quan-ly/sinh-vien/sua')}}/{{$sinhvien->id}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-md-3 control-label">Họ Tên</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="name" name='name' placeholder="Nhập Họ Tên" value="{{$sinhvien->Ten}}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">
                <input type="email" class="form-control" id="email" name='email' placeholder="Nhập Email" value="{{$sinhvien->Email}}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-md-3 control-label">Số điện thoại</label>
            <div class="col-md-9">
                <input type="tel" class="form-control" id="phone" name='phone' placeholder="Nhập Số điện thoại" value="{{$sinhvien->SDT}}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="khu" class="col-md-3 control-label">Khu</label>
            <div class="col-md-9">
                <select class="form-control select" name="khu" id="khu">
                    <option value="0">-- Chọn Khu --</option>
                    @foreach ($khu as $value)
                    <option 
                        @if ($value->id == $sinhvien->giuong->phong->tang->khu->id)
                            {{'selected'}}
                        @endif
                    value="{{$value->id}}">{{$value->khu}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="tang" class="col-md-3 control-label">Chọn Tầng</label>
            <div class="col-md-9">
                <select class="form-control select" name="tang" id="tang">
                    <option value="0">-- Chọn Tầng --</option>
                    @foreach ($tang as $value)
                    <option 
                        @if ($value->id == $sinhvien->giuong->phong->tang->id)
                            {{'selected'}}
                        @endif
                    value="{{$value->id}}">{{$value->tang}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="phong" class="col-md-3 control-label">Chọn Phòng</label>
            <div class="col-md-9">
                <select class="form-control select" name="phong" id="phong">
                    <option value="0">-- Chọn Phòng --</option>
                    @foreach ($phong as $value)
                    <option 
                        @if ($value->id == $sinhvien->giuong->phong->id)
                            {{'selected'}}
                        @endif
                    value="{{$value->id}}">{{$value->phong}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="giuong" class="col-md-3 control-label">Giường</label>
            <div class="col-md-9">
                <select class="form-control select" name="giuong" id="giuong">
                    <option value="0">-- Chọn Giường --</option>
                    @foreach ($giuong as $value)
                    <option 
                        @if ($value->id == $sinhvien->giuong->id)
                            {{'selected'}}
                        @endif
                    value="{{$value->id}}">{{$value->giuong}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="avatar" class="col-md-3 control-label">Upload avater</label>

            <div class="col-md-9">
                <input type="file" class="form-control" id="avatar" name="file">
            </div>
        </div>
            <div class="form-group row">
                <label  class="col-md-3 control-label">Ảnh đại diện</label>
                <div class="col-md-9">
                    @if ($sinhvien->avatar != '')
                    <img  src="{{asset('admin_assets/upload')}}/{{$sinhvien->avatar}}" width="30%" alt="">
                    @else
                    {{'Không có ảnh đại diện'}}
                    @endif

                </div>
        </div>
        <div class="" id="p-c1">
            <div class="form-group row">
                <div class="col-md-4"></div>
                <label for="change-password" class="col-md-8 control-label" >
                    <span class="btn btn-warning" id="span">

                    Muốn đổi mật khẩu nhấn vào đây
                </span>
            </label>
                    <input type="checkbox" class="form-control" style="display: none" id="change-password" name="mu">
            </div>
        </div>
        <div class="password" id="password">
            <div class="form-group row">
                <label for="passwordnew" class="col-md-3 control-label">Mật khẩu mới</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="passwordnew" placeholder="Nhập mật khẩu mới" name='password'>
                </div>
            </div>
            <div class="form-group row">
                <label for="repassword" class="col-md-3 control-label">Nhập lại mật khẩu mới</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu mới" name='repassword'>
                </div>
            </div>
        </div>
        <div class="form-group row justify-content-end">
            <label class="col-md-3 control-label">Chức vụ</label>
            <div class="col-md-9">
                <div class="checkbox-info">
                    <input id="radio1" type="radio" value="1"
                    @if ($sinhvien->quyen == 1)
                        {{'checked'}}

                    @endif
                    name="quyen">
                    <label class="btn btn-outline-info button
                    @if ($sinhvien->quyen == 1)
                    {{'selected'}}

                    @endif
                "  id="pass" for="radio1">
                        Trưởng tầng
                    </label>

                    <input id="radio2" type="radio" value="2"
                    @if ($sinhvien->quyen == 2)
                        {{'checked'}}
                    @endif
                     name="quyen">
                    <label for="radio2" id="pass"  class="btn btn-outline-info button
                    @if ($sinhvien->quyen == 2)
                    {{'selected'}}

                    @endif
                    ">
                        Trưởng phòng
                    </label>
                    <input id="radio3" type="radio" value="0"
                    @if ($sinhvien->quyen == 0)
                        {{'checked'}}
                    @endif
                     name="quyen">
                    <label for="radio3" id="pass"  class="btn btn-outline-info button
                    @if ($sinhvien->quyen == 0)
                    {{'selected'}}

                    @endif
                    ">
                        Không có
                    </label>
        <div class="form-group row justify-content-end mb-0">
                <button class="col-md-12 btn btn-info" type="submit">Sửa</button>
        </div>
    </form>
</div>
</div>
@endsection

@section('script')
<script>
    $('#change-password').change(function(){
        var div = document.getElementById('span');
        if($(this).is(':checked')){
            document.getElementById("password").classList.remove('password');
            document.getElementById("span").innerHTML = 'Không muốn đổi thì nhấn lại vào đây';
        }
        else{
            document.getElementById("password").classList.add('password');
            document.getElementById("span").innerHTML = 'Muốn đổi mật khẩu nhấn vào đây';

        }
    });
</script>
<script>
    $basic_url = "http://greendormitory.com/quan-ly/load/khu/";
    $(document).ready(function(){
        $("#khu").change(function(){
            var idtang = $(this).val();
            $.get($basic_url +idtang, function(data){
                $("#tang").html(data);
            });
        });
    });
</script>
<script>
    $url = "http://greendormitory.com/quan-ly/load/tang/";
    $(document).ready(function(){
        $("#tang").change(function(){
            var idphong = $(this).val();
            $.get($url + idphong, function(data){
                $("#phong").html(data);
            });
        });
    });
</script>
<script>
    $url_phong = "http://greendormitory.com/quan-ly/load/phong/";
    $(document).ready(function(){
        $("#phong").change(function(){
            var idgiuong = $(this).val();
            $.get($url_phong + idgiuong, function(data){
                $("#giuong").html(data);
            });
        });
    });
</script>

<script>
    $('.button').on('click', function() {
        $('.button').removeClass('selected');
        $(this).addClass('selected');
    });
</script>


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
@endsection