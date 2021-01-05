<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
	<div class="navbar-wrapper ">
		<div class="navbar-brand header-logo">
			<a href="{{url('sinh-vien')}}" class="b-brand">
				<img src="{{asset('logo/green3.png')}}" width="29%" alt="" class="logo images">
				<img src="{{asset('logo/logoofme1.png')}}"width="60%" alt="" class="logo-thumb images">
			</a>
			<a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
		</div>
		<div class="navbar-content scroll-div">
			<ul class="nav pcoded-inner-navbar">
				<li class="nav-item pcoded-menu-caption">
					<label>Quản lý</label>
				</li>
				<li class="nav-item">
					<a href="{{url('sinh-vien')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Xin chào, {{Auth::guard('sinh_vien')->user()->Ten}}</span></a>
				</li>
				
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-bolt"></i><i class="fas fa-tint"></i></i></span><span class="pcoded-mtext">Điện nước</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="#" class="">Điện tháng này</a></li>
						<li class=""><a href="#" class="">Nước tháng này</a></li>
					</ul>
				</li>
				
				{{-- <li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-house-user"></i></span><span class="pcoded-mtext">Quản Lý Phòng</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('sinh-vien/khu-nam/sinh-vien-phong-nam')}}" class="">Khu Nam</a></li>
						<li class=""><a href="{{url('sinh-vien/khu-nu	/sinh-vien-phong-nu')}}" class="">Khu Nữ</a></li>
					</ul>
				</li>
				
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-graduate"></i></span><span class="pcoded-mtext">Sinh viên</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('sinh-vien/sinh-vien')}}" class="">Danh sách sinh viên</a></li>
						<li class=""><a href="{{url('sinh-vien/sinh-vien/them')}}" class="">Thêm</a></li>
					</ul>
				</li> --}}
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="far fa-envelope" aria-hidden="true"></i></span><span class="pcoded-mtext">Thông báo tổ quản lý</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('thong-bao')}}" class="">Thông báo của tổ quản lý</a></li>
						<li class=""><a href="{{url('thong-bao/gui')}}" class="">Phản ánh tới tổ quản lý</a></li>
						<li class=""><a href="{{url('thong-bao/da-gui')}}" class="">Thư đã gửi</a></li>
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-cog"></i></span><span class="pcoded-mtext">Cài đặt tài khoản</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="#" class="">Đổi mật khẩu</a></li>
						<li class=""><a href="{{url('sinh-vien/dang-xuat')}}" class="">Đăng xuất</a></li>
					</ul>
				</li>
			</ul>
			
			</div>
		</div>
	</div>
</nav>