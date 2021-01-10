@extends('page.view.sinhvien.layout.master')
@section('title')
    Điện tháng này
@endsection
@section('css')
<style>
.bg-dien{
    background-image: linear-gradient(90deg, rgba(72, 152, 37, 0.7), rgba(253, 253, 2, 0.639));
}
.bg-dien-alt{
    background-image: linear-gradient(-90deg, rgba(72, 152, 37, 0.7), rgba(253, 253, 2, 0.639));
}

.class i{
    line-height: 120px;
    font-size: 100px;
    /* font-height: 10PX; */
    color: black;
  vertical-align: middle;
}
.hihi i{
    font-size: 100px;
    /* font-height: 10PX; */
    color: black;
  vertical-align: middle;
}
.class span{
    line-height: 120px;
    font-size: 100px;
    font-weight: bold;
    color: black;
  vertical-align: middle;
}

</style>
@endsection
@section('content')
    <div class="hi container">
        <div class="row">
            <div class="col-xl-5 col-md-5">
                <div class="card prod-p-card bg-dien">
                    <div class="card-body">
                        <div class="row align-items-center m-b-25">
                            <div class="col">
                                <h6 class="m-b-5 ">Số điện cuối cùng của tháng này</h6>
                                <h3 class="m-b-0 ">{{$dien->soDienCuoiThang}}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bolt text-c-red f-18"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-2 text-center justify-content-center">
                <div class="bg-transparent">
                    <div class="class">
                            <i class="fas fa-minus"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-md-5">
                <div class="card prod-p-card bg-dien-alt">
                    <div class="card-body">
                        <div class="row align-items-center m-b-25">
                            <div class="col">
                                <h6 class="m-b-5 ">Số điện cuối cùng của tháng trước</h6>
                                <h3 class="m-b-0 ">{{$dien->soDienDauThang}}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bolt text-c-red f-18"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12 text-center justify-content-center">
                <div class="bg-transparent">
                    <div class="class">
                            <span class="">x</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-4"></div>
            <div class="col-xl-4 col-md-4">
                <div class="card prod-p-card bg-dien-alt">
                    <div class="card-body">
                        <div class="row align-items-center m-b-25">
                            <div class="col">
                                <h6 class="m-b-5 ">1 chữ điện</h6>
                                <h3 class="m-b-0">3000 <small><sup>VNĐ</sup></small></h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt text-c-red f-18"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12 text-center justify-content-center">
                <div class="bg-transparent">
                    <div class="hihi">
                        <i class="fas fa-equals"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-4"></div>
            <div class="col-xl-4 col-md-4">
                <div class="bg-dien">
                    <div class="card-body text-center">
                        <div class="align-items-center m-b-25">
                            
                                <h4 class="m-b-5 ">{{$dien->tongtien}}<small><sup>VNĐ</sup></small></h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection