
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Style -->
    <style>
        .top{
            background-color: rgba(0, 0, 0, 0.299);
            text-align: center;
            border: 1px rgb(6, 69, 133) solid;
            
        }
        .logo{text-align: center;}

        .info h1, .info h3, .info h2{
            letter-spacing: 1px;
            text-align: center;
            font-family: Courier;
            color: rgb(255, 255, 255);
        }
        
        .background{
                
                background-repeat: no-repeat;
                background-image: url(https://daphovinahotel.com/wp-content/uploads/2019/07/N5_9842_SENIOR_6.jpg) ;
                background-size: cover;
        }
        .btn{
            
            text-decoration: none;
            display:inline-block;font-weight:400;color:#212529;text-align:center;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:transparent;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;line-height:1.5;border-radius:.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out}@media (prefers-reduced-motion:reduce){.btn{transition:none}}.btn:hover{color:#212529;text-decoration:none}.btn.focus,.btn:focus{outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}
        .btn-success{color:rgb(31, 131, 231);background-color:#00ffe5;border-color:#28a745}.btn-success:hover{color:#fff;background-color:#00ddff;border-color:#1e7e34}.btn-success.focus,.btn-success:focus{box-shadow:0 0 0 .2rem rgba(72,180,97,.5)}
        .buttonrVerify{
            font-family:times;
            text-align: center;
        }
    </style>
  </head>
  <body>
        <div class="cover">
      <div class="background">
          <br>
        <div class="logo"><img src="https://lh3.googleusercontent.com/lyoLL968l_JZNQjnLRPL5jZCpoZC3iSE-3N2UyofAgc4LhkcgKxqj_zMD_Y71REg1x0KFY8NKOT7iD3A_1SYt5fTYryrYZpPwcT4jT6JWjB4V9DQOgDaK6t4Fwy3J339lZLqEEc-1_yoNpr0fYlC7mzyg9YYNJDaFdkehDrxDMRUPbZsehFdc_g05rETt-hhJa599ZcnGy9__mHsgx14oCmbjp_bv04DhhstGO87CxCEVbAbDTiUDVFU95JGuN7dxP56JeD_gdDq8PybFRtTLxsEBqrCLLjw1bmgkfg364yt72mlQG01iExwXB3MGxuyKZkoxJCSCFT3_9ea5A7creV1pMgVzL2LiZzYZcZMRoHbxRjCstjj5jrB-2bOb_ew3MFfEdRPNHdG3puZR7JpYv3sJB_boei_X-XHk_Xyv8ph32SR5gFkRIL01z5mX92ixNMJ04aBoatgU-67NNiGB95l9Rxxr38CzPiSa6aPFzUp4-gX2wL9BrsjyvizOzeqks-mEF84mJ1RG_7OywBbI6PcDZ__IUOqdiOF7zKcrTRP4EM46ry4PwRbn1jZ5cQD8XMV0w50udcxKgMd-G5Rh_9tSc4t1OR9J8ltvEFEzV8-YbR7GGa6ufq-kB_Q_hPAUNj6WAeqMnukxqnAip3dvhnenOqP1Bg68npvLC664L4gt66r7onZB-IVVsov=w185-h186-no?authuser=1" width="20%" alt="" srcset=""></div>
          <div class=" top">
                    <div class="info">
                        <h1>Xin Chào, <b>{{$sendmail->thue->Ten}}</b></h1>
                        @if ($sendmail->thue->id_giuong > 0)
                          <h2>Bạn đã đặt: {{$sendmail->thue->giuong->phong->tang->khu->khu}} - 
                                          {{$sendmail->thue->giuong->phong->tang->tang}} - 
                                          {{$sendmail->thue->giuong->phong->phong}} - 
                                          {{$sendmail->thue->giuong->giuong}}
                          </h2>
                        @endif
                        <h2>Hãy xác nhận email của bạn</h2>
          </div>
           
        </div>
                <br><br><br>
        <div class="buttonrVerify mt-3">
            <a class="btn btn-success" href="{{url('nguoi-thue/verify')}}/{{$sendmail->token}}">VeriFy Email</a>
            <br><br><br>
        </div>
</div>
</div>
  </body>
</html>
