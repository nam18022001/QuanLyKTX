@if (Auth::guard('sinh_vien')->check() && Auth::guard('sinh_vien')->user()->verified != 1)
<!doctype html>
<html lang="en">
<head>
<title>Xác thực email</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    .not-active{
        pointer-events: none;
        cursor: default;
        
    }
    .hi{margin: auto;}
</style>  
</head>
<body>
    <div class="hi">
    <div class="container text-center">
@if (session('loi'))
    <div class="alert alert-danger text-center">
        {{session('loi')}}
    </div>
@endif
<span>Gửi mail thành công hãy xem trong hộp thư gmail của bạn</span><br>
<a href="{{url('email/resend')}}" onclick="countdown();" class"" id="resend">Gửi lại</a>
<div id="counter">1:00</div>
<div class="a" class="a"></div>
<input type="hidden" name="" value="{{ Auth::guard('sinh_vien')->user()->verified}}" id="verified">
</div>
</div>

{{-- <script language="javascript">
    setInterval(function(){
        var s = document.getElementById("verified").value;
        if (s == 1) {
            window.location = 'http://greendormitory.com/';
            clearInterval();
        }
    }, 1000);
  </script> --}}
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    function countdown() {
    var seconds = 60;
    function tick() {
        var counter = document.getElementById("counter");
        seconds--;
        counter.innerHTML = "0:" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            setTimeout(tick, 1000);
            // document.getElementById('resend').removeAttribute("href");
            document.getElementById('resend').classList.add('not-active');
        } else {

            document.getElementById('resend').classList.remove('not-active');
        }
    }
    tick();
}
countdown();
</script>
    </body>
    </html>
@endif
