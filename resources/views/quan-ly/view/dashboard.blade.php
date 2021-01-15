@extends('quan-ly.layout.master')



@section('title')
@if (Auth::user()->position == 1)
{{'Quản Lý'}}
@elseif (Auth::user()->position == 2)
{{'Tổ quản lý KTX'}}
@endif
@endsection
@section('content')

@if (Auth::user()->position == 1 || Auth::user()->position == 2)
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5>Quản lý</h5>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><i class="feather icon-home"></i></li>
					<li class="breadcrumb-item"><a href="#">Báo cáo</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">

	<!-- product profit start -->
	<div class="col-xl-3 col-md-6">
		<div class="card prod-p-card bg-c-red">
			<div class="card-body">
				<div class="row align-items-center m-b-25">
					<div class="col">
						<h6 class="m-b-5 text-white">Tổng Số Sinh Viên Ở</h6>
						<h3 class="m-b-0 text-white">{{$sinhvien}}</h3>
					</div>
					<div class="col-auto">
						<i class="fas fa-user-graduate text-c-red f-18"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card prod-p-card bg-c-blue">
			<div class="card-body">
				<div class="row align-items-center m-b-25">
					<div class="col">
						<h6 class="m-b-5 text-white">Tổng Số Quản Lý KTX</h6>
						<h3 class="m-b-0 text-white">{{$thue}}</h3>
					</div>
					<div class="col-auto">
						<i class="fas fa-cogs text-c-blue f-18"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card prod-p-card bg-c-green">
			<div class="card-body">
				<div class="row align-items-center m-b-25">
					<div class="col">
						<h6 class="m-b-5 text-white">Tổng Số Tài Khoản</h6>
						<h3 class="m-b-0 text-white">{{$tongtaikhoan }}</h3>
					</div>
					<div class="col-auto">
						<i class="fas fa-users text-c-green f-18"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6">
		<div class="card prod-p-card bg-c-yellow">
			<div class="card-body">
				<div class="row align-items-center m-b-25">
					<div class="col">
						<h6 class="m-b-5 text-white">Thông Báo</h6>
						<h3 class="m-b-0 text-white">{{$thongbao}}</h3>
					</div>
					<div class="col-auto">
						<i class="fas fa-envelope-open text-c-yellow f-18"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- product profit end -->
	{{-- <div class="col-md-12 col-xl-4">
		<div class="card card-social">
			<div class="card-block border-bottom">
				<div class="row align-items-center justify-content-center">
					<div class="col-auto">
						<i class="fab fa-facebook-f text-primary f-36"></i>
					</div>
					<div class="col text-right">
						<h3>12,281</h3>
						<h5 class="text-c-blue mb-0">+7.2% <span class="text-muted">Total Likes</span></h5>
					</div>
				</div>
			</div>
			<div class="card-block">
				<div class="row align-items-center justify-content-center card-active">
					<div class="col-6">
						<h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>35,098</h6>
						<div class="progress">
							<div class="progress-bar progress-c-blue" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="col-6">
						<h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>350</h6>
						<div class="progress">
							<div class="progress-bar progress-c-green" role="progressbar" style="width:45%;height:6px;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-4">
		<div class="card card-social">
			<div class="card-block border-bottom">
				<div class="row align-items-center justify-content-center">
					<div class="col-auto">
						<i class="fab fa-twitter text-c-info f-36"></i>
					</div>
					<div class="col text-right">
						<h3>11,200</h3>
						<h5 class="text-c-info mb-0">+6.2% <span class="text-muted">Total Likes</span></h5>
					</div>
				</div>
			</div>
			<div class="card-block">
				<div class="row align-items-center justify-content-center card-active">
					<div class="col-6">
						<h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>34,185</h6>
						<div class="progress">
							<div class="progress-bar progress-c-blue" role="progressbar" style="width:40%;height:6px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="col-6">
						<h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>800</h6>
						<div class="progress">
							<div class="progress-bar progress-c-green" role="progressbar" style="width:70%;height:6px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-4">
		<div class="card card-social">
			<div class="card-block border-bottom">
				<div class="row align-items-center justify-content-center">
					<div class="col-auto">
						<i class="fab fa-google-plus-g text-c-red f-36"></i>
					</div>
					<div class="col text-right">
						<h3>10,500</h3>
						<h5 class="text-c-red mb-0">+5.9% <span class="text-muted">Total Likes</span></h5>
					</div>
				</div>
			</div>
			<div class="card-block">
				<div class="row align-items-center justify-content-center card-active">
					<div class="col-6">
						<h6 class="text-center m-b-10"><span class="text-muted m-r-5">Target:</span>25,998</h6>
						<div class="progress">
							<div class="progress-bar progress-c-blue" role="progressbar" style="width:80%;height:6px;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="col-6">
						<h6 class="text-center  m-b-10"><span class="text-muted m-r-5">Duration:</span>900</h6>
						<div class="progress">
							<div class="progress-bar progress-c-green" role="progressbar" style="width:50%;height:6px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- sessions-section start -->
	<div class="col-xl-8 col-md-6">
		<div class="card table-card">
			<div class="card-header">
				<h5>Quản lý tầng khu</h5>
			</div>
			<div class="card-body px-0 py-0">
				<div class="table-responsive">
					<div class="session-scroll" style="height:478px;position:relative;">
						<table id="dataTable2" class="text-center">
							<thead class="text-capitalize">
							<tr>
							<th>Tên</th>
							<th>Lớp</th>
							<th>Mã sinh viên</th>
							<th>Email</th>
							<th>Số điện thoại</th>
							<th>Khu/Tầng: </th>
							</tr>
							</thead>
							<tbody>
								@foreach ($truong_tang as $item)
									<tr>
										<td>
											{{$item->Ten}}
										</td>
										<td>
											{{$item->Lop}}
										</td>
										<td>
											{{$item->MSSV}}
										</td>
										<td>
											{{$item->email}}
										</td>
										<td>
											0{{$item->SDT}}
										</td>
										<td>
											{{$item->giuong->phong->tang->khu->khu}} / {{$item->giuong->phong->tang->tang}} / {{$item->giuong->phong->phong}}
										</td>
									</tr>
								@endforeach
							</tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- sessions-section end -->
	<div class="col-md-6 col-xl-4">
		<div class="card user-card">
			<div class="card-header">
				<h5>Hồ Sơ</h5>
			</div>
			<div class="card-body  text-center">
				<div class="usre-image">
					{{-- <img src="{{asset('admin_assets/assets/images/widget/img-round1.jpg')}}" class="img-radius wid-100 m-auto" alt="User-Profile-Image"> --}}
					@if (!empty(Auth::user()->avatar))
							<img src="{{asset('admin_assets/upload')}}/{{Auth::user()->avatar}}" class="img-radius  wid-100 m-auto" alt="User-Profile-Image">
							@else
							<img src="{{asset('logo/green3.png')}}" class="img-radius  wid-100 m-auto" alt="User-Profile-Image">
						@endif
				</div>
				<h6 class="f-w-600 m-t-25 m-b-10">{{Auth::user()->name}}</h6>
				<p>{{Auth::user()->email}} | {{Auth::user()->SDT}} | {{Auth::user()->CMND}} | {{Auth::user()->QueQuan}}</p>
				<hr>
				<p class="m-t-15">Activity Level: 87%</p>
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

<!-- [ Main Content ] end -->
@else
	<div class="alert alert-danger">
		Bạn không có quyền vào trang này
	</div>
@endif





@endsection