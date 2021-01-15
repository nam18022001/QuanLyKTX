@extends('quan-ly.layout.master')



@section('title')
Cập nhật điện phòng {{$suadiennam->phong->phong}}
@endsection
@section('css')
    
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@endsection
@section('content')

<form action="{{url('quan-ly/dien-nuoc/khu-nam/dien/sua', $suadiennam->id)}}" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-12 text-center">
            Cập nhật ngày: <i>{{$suadiennam->updated_at->isoFormat('dd\\, \\n\\g\\à\\y D\\, MMMM\\, YYYY \\| H:mm:ss')}}</i>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="dientruoc">Số điện cuối tháng trước</label>
        </div><div class="col-md-1"></div>
        <div class="col-md-3">
            <label for="diensau">Số điện cuối tháng này</label>
        </div><div class="col-md-1"></div>
        <div class="col-md-3">
            <label for="tongtien">Tổng số tiền</label>
        </div>
    </div>
    <div class="row form-group">
      <div class="col-md-3"> 
        <input type="text" id="dientruoc" name="dientruoc" class="form-control bg-white"
        @if (empty($suadiennam->soDienDauThang))
            value="0"
            @else
            value="{{$suadiennam->soDienDauThang}}"
        @endif 
         placeholder="Số điện cuối tháng trước">
      </div><div class="col-md-1"></div>
      <div class="col-md-3">
        <input type="number" id="diensau" name="dien" class="form-control bg-white" value="{{$suadiennam->soDienCuoiThang}}" placeholder="Số điện cuối tháng này">
      </div><div class="col-md-1"></div>
      <div class="col-md-3">
        <input type="text" id="tongtien"class="form-control bg-light" value="{{$suadiennam->tongtien}}" disabled placeholder="Tổng số tiền">
      </div>
    </div>
    <div class="row  text-center">
        <div class="col-md-3"></div>
        <button class="col-md-6 btn btn-primary" type="submit">Cập nhật</button>
    </div>
  </form>

@endsection
@section('script')

@endsection
