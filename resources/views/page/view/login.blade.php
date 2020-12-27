<!DOCTYPE html>
<html lang="en">

<head>

	<title>Đăng nhập</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- style css -->
    <link rel="stylesheet" href="{{asset('admin_assets/assets/css/styles.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('admin_assets/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('admin_assets/assets/fontawesome/css/all.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('admin_assets/assets/plugins/animation/css/animate.min.css')}}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('admin_assets/assets/css/style.css')}}">


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card-body">
                        @if (session('loginfail'))
                            <div class="alert alert-danger">
                                {{session('loginfail')}}
                            </div>
                        @endif
                        @if (session('nologin'))
                            <div class="alert alert-danger">
                                {{session('nologin')}}
                            </div>
                        @endif
                        @if (session('positionlogin'))
                            <div class="alert alert-danger">
                                {{session('positionlogin')}}
                            </div>
                        @endif
                    
                        <div class="text-center">
                            <img src="{{asset('logo/green3.png')}}" alt="" width="20%" class="img-fluid mb-4">
                        </div>
                        <h4 class="mb-3 f-w-400">Đăng Nhập</h4>
                        <form action="{{ url('dang-nhap') }}" method="post">
                            {{ csrf_field() }}
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="feather icon-mail"></i></span>
							</div>
							<input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="feather icon-lock"></i></span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
						</div>
						
						<div class="form-group text-left mt-2">
							<div class="checkbox checkbox-primary d-inline">
								<input type="checkbox" name="remember" id="checkbox-fill-a1">
								<label for="checkbox-fill-a1" class="cr">Lưu tài khoản?</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary mb-4">Đăng Nhập</button>
                        <p class="mb-2 text-muted">Quên mật khẩu? <a href="auth-reset-password.html" class="f-w-400">Lấy lại</a></p>
                        <p class="mb-2 text-muted">Bạn chưa có tài khoản? <a href="{{ url('dang-ki')}}" class="f-w-400">Đăng kí</a></p>
                        </form>
					</div>
				</div>
				<div class="col-md-6 d-none d-md-block">
					<img src="{{asset('admin_assets/assets/images/auth-bg.jpg')}}" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{asset('admin_assets/assets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('admin_assets/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>


<div class="footer-fab">
    <div class="b-bg">
        <i class="fas fa-question"></i>
    </div>
    <div class="fab-hover">
        <ul class="list-unstyled">
            <li><a href="../doc/index-bc-package.html" target="_blank" data-text="UI Kit" class="btn btn-icon btn-rounded btn-info m-0"><i class="feather icon-layers"></i></a></li>
            <li><a href="../doc/index.html" target="_blank" data-text="Document" class="btn btn-icon btn-rounded btn-primary m-0"><i class="feather icon feather icon-book"></i></a></li>
        </ul>
    </div>
</div>


</body>

</html>
