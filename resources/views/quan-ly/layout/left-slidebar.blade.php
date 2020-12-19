<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
	<div class="navbar-wrapper ">
		<div class="navbar-brand header-logo">
			<a href="index.html" class="b-brand">
				<img src="assets/images/logo.svg" alt="" class="logo images">
				<img src="assets/images/logo-icon.svg" alt="" class="logo-thumb images">
			</a>
			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
		</div>
		<div class="navbar-content scroll-div">
			<ul class="nav pcoded-inner-navbar">
				<li class="nav-item pcoded-menu-caption">
					<label>Quản lý</label>
				</li>
				<li class="nav-item">
					<a href="{{url('quan-ly')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Quản trị</span></a>
				</li>
				
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-bolt"></i><i class="fas fa-tint"></i></i></span><span class="pcoded-mtext">Điện nước</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="#" class="">Điện nước khu Nam</a></li>
						<li class=""><a href="#" class="">Điện nước khu nữ</a></li>
					</ul>
				</li>
				
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-house-user"></i></span><span class="pcoded-mtext">Quản Lý Phòng</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="{{url('quan-ly/khu-nam/quan-ly-phong-nam')}}" class="">Khu Nam</a></li>
						<li class=""><a href="{{url('quan-ly/khu-nu	/quan-ly-phong-nu')}}" class="">Khu Nữ</a></li>
					</ul>
				</li>
				
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-graduate"></i></span><span class="pcoded-mtext">Sinh viên</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="#" class="">Danh sách</a></li>
						<li class=""><a href="#" class="">Thêm</a></li>
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fa fa-tasks" aria-hidden="true"></i></span><span class="pcoded-mtext">Quản lý</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="#" class="">Danh sách</a></li>
						<li class=""><a href="#" class="">Thêm</a></li>
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="#" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-cog"></i></span><span class="pcoded-mtext">Cài đặt tài khoản</span></a>
					<ul class="pcoded-submenu">
						<li class=""><a href="#" class="">Hồ sơ</a></li>
						<li class=""><a href="#" class="">Đổi mật khẩu</a></li>
						<li class=""><a href="#" class="">Đăng xuất</a></li>
					</ul>
				</li>
				@if (Auth::user()->position == 1)	
				<li class="nav-item pcoded-menu-caption">
					<label>Cài đặt</label>
				</li>
				<li class="nav-item"><a href="##" class="nav-link"><span class="pcoded-micon"><i class="fas fa-cog"></i></i></span><span class="pcoded-mtext">Cài đặt trang</span></a></li>
				@if ($pageoff->status == 0)
				<li class="nav-item"><a href="{{ url('shutup')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Mở trang</span></a></li>					
				@else
				<li class="nav-item"><a href="{{ url('shutdown')}}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Đóng trang</span></a></li>
				@endif
				@endif
			</ul>
			
			</div>
		</div>
	</div>
</nav>