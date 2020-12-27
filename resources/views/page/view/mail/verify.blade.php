<style>
    .not-active {
      pointer-events: none;
      cursor: default;
      text-decoration: none;
    }
</style>
Gửi mail thành công hãy xem trong hộp thư gmail của bạn<br>
<a href="" onclick="countdown();" class"" id="resend">Gửi lại</a>
<div id="counter">1:00</div>
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
						a.href = "#"
            document.getElementById('resend').classList.remove('not-active');
        }
    }
    tick();
}
countdown();


</script>