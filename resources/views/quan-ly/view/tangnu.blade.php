@extends('quan-ly.layout.master')
@section('title')
    Quản Lý Phòng Nữ
@endsection
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
@endsection
@section('content')
    <div class="container">
        <div class="row">
                @foreach ($khu->tang as $item)
             <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                    <img src="{{asset('admin_assets/img/icon-floor.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$item->tang}}</h5>
                    <a href="{{url('quan-ly/khu-nu/tang')}}/{{$item->id}}" class="btn btn-primary">Quản lý phòng</a>
                </div>
                    </div>
            </div>

                @endforeach
        </div>
    </div>
@endsection

@section('script')

@endsection