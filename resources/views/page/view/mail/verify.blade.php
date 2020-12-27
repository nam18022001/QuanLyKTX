<style>
    .not-active {
      pointer-events: none;
      cursor: default;
      text-decoration: none;
    }
</style>
Gửi mail thành công hãy xem trong hộp thư gmail của bạn<br>
<a href="" target="_blank" onclick="countdown();" class"" id="resend">Gửi lại</a>
<div id="counter">1:00</div>
@if (Auth::guard('sinh_vien')->check() && Auth::guard('sinh_vien')->user()->verified != 1)
<script>
    function countdown() {
    var seconds = 60;
    function tick() {
        var counter = document.getElementById("counter");
        seconds--;
        counter.innerHTML = "0:" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            setTimeout(tick, 1000);
            document.getElementById('resend').removeAttribute("href");
            document.getElementById('resend').classList.add('not-active');
        } else {
            var a = document.getElementById('resend');
						a.href = "sinh-vien/verified"
            document.getElementById('resend').classList.remove('not-active');
        }
    }
    tick();
}
countdown();


</script>
@elseif(Auth::guard('nguoi_thue')->check() && Auth::guard('nguoi_thue')->user()->verified != 1)
<script>
    function countdown() {
    var seconds = 60;
    function tick() {
        var counter = document.getElementById("counter");
        seconds--;
        counter.innerHTML = "0:" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            setTimeout(tick, 1000);
            document.getElementById('resend').removeAttribute("href");
            document.getElementById('resend').classList.add('not-active');
        } else {
            var a = document.getElementById('resend');
						a.href = "nguoi-thue/verified"
            document.getElementById('resend').classList.remove('not-active');
        }
    }
    tick();
}
countdown();


</script>
@endif
