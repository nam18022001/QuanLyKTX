@extends('quan-ly.layout.master')
@section('title')
    Thêm sinh viên
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
    
    .display-password {
        display: none;
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
    
    .steps-form-2 {
        display: table;
        width: 100%;
        position: relative;
    }
    
    .steps-form-2 .steps-row-2 {
        display: table-row;
    }
    
    .steps-form-2 .steps-row-2:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 95%;
        height: 2px;
        background-color: #eb15e7;
    }
    
    .steps-form-2 .steps-row-2 .steps-step-2 {
        display: table-cell;
        text-align: center;
        position: relative;
    }
    
    .steps-form-2 .steps-row-2 .steps-step-2 p {
        margin-top: 0.5rem;
    }
    
    .steps-form-2 .steps-row-2 .steps-step-2 button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }
    
    .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2 {
        width: 70px;
        height: 70px;
        border: 2px solid #1e9fdf;
        background-color: white !important;
        color: #59698D !important;
        border-radius: 50%;
        padding: 22px 18px 15px 18px;
        margin-top: -22px;
    }
    
    .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2:focus,
    .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2:visited {
        width: 70px;
        height: 70px;
        border: 2px solid #1e9fdf;
        background-color: white !important;
        color: #59698D !important;
        border-radius: 50%;
        padding: 22px 18px 15px 18px;
        margin-top: -22px;
    }
    
    .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2:hover {
        border: 2px solid #4285F4;
        color: #4285F4 !important;
        background-color: white !important;
    }
    
    .steps-form-2 .steps-row-2 .steps-step-2 .btn-circle-2 .fa {
        font-size: 1.7rem;
    }
    .not-active {
  pointer-events: none;
  cursor: default;
  text-decoration: none;
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
    @if (session('loituychon'))
    <div class="alert alert-danger">
        {{session('loituychon')}}
    </div>
@endif
    <div class="mt-5">
        <h2 class=" col-md-12 text-center font-bold"><strong>Thêm Sinh Viên hoặc Người thuê</strong></h2>

    <!-- Stepper -->
    <div class="col-md-12 mt-5 steps-form-2">
        <div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
            <div class="steps-step-2">
                <a href="#step-1" type="button" class="not-active btn btn-amber btn-circle-2 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="Basic Information"><i class="fa fa-user-friends"></i></a>
            </div>
            <div class="steps-step-2">
                <a href="#step-2" type="button" class="not-active btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Personal Data"><i class="fa fa-edit"></i></a>
            </div>
            <div class="steps-step-2">
                <a href="#step-3" type="button" class="not-active btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Terms and Conditions"><i class="fa fa-images"></i></a>
            </div>
            <div class="steps-step-2">
                <a href="#step-4" type="button" class="not-active btn btn-blue-grey btn-circle-2 waves-effect mr-0" data-toggle="tooltip" data-placement="top" title="Finish"><i class="fa fa-check" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    <!-- First Step -->
    <form class="form-horizontal mt-3" action="{{url('quan-ly/sinh-vien/them')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class=" setup-content-2 mt-5" id="step-1">
            <div class="col-md-12">
                <h3 class="font-weight-bold text-center pl-0 my-4"><strong>Vui lòng nhập tất cả các trường</strong></h3>
                <div class="form-group row">
                    <label for="name" class="col-md-3 control-label">Họ Tên</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="name" name='name' placeholder="Nhập Họ Tên">
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
                            <input type="number" class="form-control" id="phone" name='phone' required placeholder="Nhập Số điện thoại">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quequan" class="col-md-3 control-label">Nơi ở</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="quequan" required name='quequan' placeholder="Nhập thành phố đang sống">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CMND" class="col-md-3 control-label">Chứng minh nhân dân hoặc thẻ căn cước</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="CMND" name='CMND' required placeholder="Nhập Chứng Minh Nhân Dân Hoặc thẻ Căn Cước">
                        </div>
                    </div>
                    <div class="display-password" id="display-password">
                        <div class="form-group row">
                            <label for="class" class="col-md-3 control-label">Lớp</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control reqquri" id="class" name='class' placeholder="Nhập Lớp Sinh Hoạt">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="MSSV" class="col-md-3 control-label">MSSV</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control reqquri" id="MSSV" name='MSSV' placeholder="Nhập Mã Số Sinh Viên">
                            </div>
                        </div>
                    </div>
                   
                <button class="btn btn btn-primary btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Quay lại</button>
                <button class="btn btn btn-primary btn-mdb-color btn-rounded nextBtn-2 float-right" type="button">Tiếp theo</button>
            </div>
        </div>

        <!-- Second Step -->
        <div class="row setup-content-2 mt-4" id="step-2">
            <div class="col-md-12">

                <div class="form-group row">
                    <label for="avatar" class="col-md-3 control-label">Thêm ảnh đại diện</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" id="avatar" name="avatar">
                    </div>
                </div>
                <button class="btn btn btn-primary btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Quay lại</button>
                <button class="btn btn btn-primary btn-mdb-color btn-rounded nextBtn-2 float-right" type="button">Tiếp Theo</button>
            </div>
        </div>

        <!-- Third Step -->
        <div class="row setup-content-2 mt-5" id="step-3">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="khu" class="col-md-3 control-label">Khu</label>
                    <div class="col-md-9">
                        <select class="form-control select" name="khu" id="khu">
                            <option value="0">-- Chọn Khu --</option>
                            @foreach ($khu as $value)
                            <option value="{{$value->id}}">{{$value->khu}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tang" class="col-md-3 control-label">Chọn Tầng</label>
                    <div class="col-md-9">
                        <select class="form-control select" name="tang" id="tang">
                            <option value="0">-- Chọn Tầng --</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phong" class="col-md-3 control-label">Chọn Phòng</label>
                    <div class="col-md-9">
                        <select class="form-control select" name="phong" id="phong">
                            <option value="0">-- Chọn Phòng --</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="giuong" class="col-md-3 control-label">Giường</label>
                    <div class="col-md-9">
                        <select class="form-control select" name="giuong" id="giuong">
                            <option value="0">-- Chọn Giường --</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn btn-primary btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Quay lại</button>
                <button class="btn btn btn-primary btn-mdb-color btn-rounded nextBtn-2 float-right" type="button">Tiếp Theo</button>
            </div>
        </div>

        <!-- Fourth Step -->
        <div class="row setup-content-2 mt-5" id="step-4">
            <div class="col-md-12">
                
                <div class="form-group row">
                    <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="password" required placeholder="Nhập mật khẩu" name='password'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="repassword" class="col-md-3 control-label">Nhập lại mật khẩu</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="repassword" required placeholder="Nhập lại mật khẩu" name='repassword'>
                    </div>
                </div>
                <button class="btn btn btn-primary btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Quay lại</button>
                <button class="btn btn-success btn-rounded float-right" type="submit">Thêm</button>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection

@section('script')
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
    function myFunction2() {
        var element = document.getElementById("display-password");
        element.classList.add("display-password");
        $('.reqquri').removeAttr("required", "");

    }
</script>
<script>
    function myFunction() {
        var element = document.getElementById("display-password");
        element.classList.remove("display-password");
        $('.reqquri').attr("required", "");


    }
</script>
<script>
    $('.button').on('click', function() {
        $('.button').removeClass('selected');
        $(this).addClass('selected');
    });
</script>

<script>
    // Tooltips Initialization
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Steppers
    $(document).ready(function() {
        var navListItems = $('div.setup-panel-2 div a'),
            allWells = $('.setup-content-2'),
            allNextBtn = $('.nextBtn-2'),
            allPrevBtn = $('.prevBtn-2');

        allWells.hide();

        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-amber').addClass('btn-blue-grey');
                $item.addClass('btn-amber');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allPrevBtn.click(function() {
            var curStep = $(this).closest(".setup-content-2"),
                curStepBtn = curStep.attr("id"),
                prevStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            prevStepSteps.removeAttr('disabled').trigger('click');
        });

        allNextBtn.click(function() {
            var curStep = $(this).closest(".setup-content-2"),
                curStepBtn = curStep.attr("id"),
                nextStepSteps = $('div.setup-panel-2 div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='number']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepSteps.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel-2 div a.btn-amber').trigger('click');
    });
</script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
@endsection