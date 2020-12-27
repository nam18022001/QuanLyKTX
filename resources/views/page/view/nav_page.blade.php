<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
    <!-- Text Logo - Use this if you don't have a graphic logo -->
    <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

    <!-- Image Logo -->
    <a class="navbar-brand " href="{{url('/')}}"><img src="{{asset('logo/green2.png')}}" width="20%" alt="alternative"></a>
    
    <!-- Mobile Menu Toggle Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-awesome fas fa-bars"></span>
        <span class="navbar-toggler-awesome fas fa-times"></span>
    </button>
    <!-- end of mobile menu toggle button -->

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#header">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#intro">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#services">Thông tin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#callMe">Phòng trống</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#projects">Phong trào - Sự kiện</a>
            </li>

            <!-- Dropdown Menu -->          
            <li class="nav-item dropdown">
                <a class="nav-link page-scroll" href="#contact" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Liên hệ</a>
            </li>
            <!-- end of dropdown menu -->

            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{url('dang-nhap')}}">Đăng nhập</a>
            </li>
        </ul>
        <span class="nav-item social-icons">
            <span class="fa-stack">
                <a href="#your-link">
                    <span class="hexagon"></span>
                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                </a>
            </span>
            <span class="fa-stack">
                <a href="#your-link">
                    <span class="hexagon"></span>
                    <i class="fab fa-twitter fa-stack-1x"></i>
                </a>
            </span>
        </span>
    </div>
</nav> <!-- end of navbar -->
<!-- end of navbar -->