@extends('quan-ly.layout.master')
@section('title')
    Quản Lý Phòng Nữ
@endsection
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .online{
            border: 1px solid rgb(58, 171, 58);
            border-radius: 100px;
            background-color: rgb(65, 172, 65);
            color: rgb(0, 0, 0);
        }
        .offline{
            border: 1px solid rgb(209, 30, 7);
            border-radius: 100px;
            background-color:rgb(209, 30, 7);;
            color: rgb(255, 255, 255);
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
                @foreach ($phong as $item)
             <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        @if ($item->hoatdong == 1)
                            <img src="{{asset('admin_assets/img/59802.png')}}" class="card-img-top">
                        @else
                            <img src="{{asset('admin_assets/img/59807.png')}}" class="card-img-top">
                        @endif
                    
                    <div class="card-body">
                    <h5 class="card-title">{{$item->phong}}</h5>
                    <p class="card-text">Trạng thái:&nbsp;  
                        @if ($item->hoatdong == 1)
                            <font class="online">
                                Đang có người ở
                            </font>
                        @else
                            <font class="offline">
                                Không có ai ở
                            </font>
                        @endif
                        </p>
                        @if ($item->hoatdong == 1)
                        <a href="{{url('quan-ly/khu-nu/phong')}}/{{$item->id}}" class="btn btn-outline-info">Sinh viên trong phòng</a>
                        
                    @endif
                </div>
                    </div>
            </div>

                @endforeach
        </div>
    </div>
@endsection

@section('script')

@endsection