@extends('page.view.sinhvien.layout.master')
@section('title')
    Sinh Viên
@endsection
@section('css')
<style>
 table{
     /* border: 1; */
     border-collapse: collapse;
 }

</style>
@endsection
@section('content')
    <div class="hi">
        <div class="row">
            <div class="col-xl-4"></div>
        <div class="col-md-6 col-xl-4">
            <div class="card user-card">
                <div class="card-header">
                    <h5>Hồ Sơ</h5>
                </div>
                <div class="card-body  text-center">
                    <div class="usre-image">
                        {{-- <img src="{{asset('admin_assets/assets/images/widget/img-round1.jpg')}}" class="img-radius wid-100 m-auto" alt="User-Profile-Image"> --}}
                        @if (!empty(Auth::guard('sinh_vien')->user()->avatar))
                                <img src="{{asset('admin_assets/upload')}}/{{Auth::guard('sinh_vien')->user()->avatar}}" class="img-radius  wid-100 m-auto" alt="User-Profile-Image">
                                @else
                                <img src="{{asset('logo/green3.png')}}" class="img-radius  wid-100 m-auto" alt="User-Profile-Image">
                            @endif
                    </div>
                    <h6 class="f-w-600 m-t-25 m-b-10">{{Auth::guard('sinh_vien')->user()->name}}</h6>
                    <p>
                        @if (Auth::guard('sinh_vien')->user()->id_giuong > 0)
                            {{Auth::guard('sinh_vien')->user()->giuong->phong->tang->khu->khu}} | {{Auth::guard('sinh_vien')->user()->giuong->phong->tang->tang}} | {{Auth::guard('sinh_vien')->user()->giuong->phong->phong}} | {{Auth::guard('sinh_vien')->user()->giuong->giuong}}</p>
                        @else
                            {{'Chưa đặt phòng'}}
                        @endif
                    <hr>
                    <p class="m-t-15">Quyền: 
                        @if (Auth::guard('sinh_vien')->user()->quyen == 1)
                            {{'Trưởng tầng'}}
                            @elseif(Auth::guard('sinh_vien')->user()->quyen == 2)
                            {{'Trưởng phòng'}}
                            @else
                            {{'Không có'}}
                        @endif
                    </p>
                    <div class="bg-c-green counter-block m-t-10 p-20">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-phone text-white f-20"></i>
                                <h6 class="text-white mt-2 mb-0">0{{Auth::guard('sinh_vien')->user()->SDT}}</h6>
                            </div>
                            <div class="col-6">
                                <i class="fas fa-envelope text-white f-20"></i>
                                <h6 class="text-white mt-2 mb-0">{{Auth::guard('sinh_vien')->user()->email}}</h6>
                            </div>
                        </div>
                    </div>
                    <p class="m-t-15">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>Lớp</th>
                                    <th>Mã số sinh viên</th>
                                    <th>Chứng minh nhân dân</th>
                                    <th>Quê quán</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{Auth::guard('sinh_vien')->user()->Lop}}</td>
                                    <td>{{Auth::guard('sinh_vien')->user()->MSSV}}</td>
                                    <td>{{Auth::guard('sinh_vien')->user()->CMND}}</td>
                                    <td>{{Auth::guard('sinh_vien')->user()->QueQuan}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </p>
                    <hr>
                    <div class="row justify-content-center user-social-link">
                        <div class="col-auto"><a href="#!"><i class="fab fa-facebook-f text-primary f-22"></i></a></div>
                        <div class="col-auto"><a href="#!"><i class="fab fa-twitter text-c-info f-22"></i></a></div>
                        <div class="col-auto"><a href="#!"><i class="fab fa-dribbble text-c-red f-22"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection