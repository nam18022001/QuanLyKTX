 <!-- Call Me -->
 <div id="callMe" class="form-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <div class="section-title">XEM PHÒNG TRỐNG</div>
                    <h2 class="white">Dành cho sinh viên có nguyện vọng ở ký túc xá</h2>
                    <p class="white">Sinh viên hay một số người thuê muốn ở ký túc xá có thể xem xét một số phòng trống và làm theo các bước dưới đây.</p>
                    <ul class="list-unstyled li-space-lg white">
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Chọn cho mình phòng ở thích hợp nhất</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Đăng ký tài khoản để có thể đặt phòng</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Đăng nhập và lựa chọn phòng dành cho mình</div>
                        </li>
                    </ul>
                </div>
            </div> <!-- end of col -->
            <div class="col-lg-6">

                <!-- Call Me Form -->
                <form id="callMeForm" data-toggle="validator" data-focus="false">
                    {{--  --}}
                    <div class="form-group">
                        <select class="form-control-select" id="khu" required>
                            <option class="select-option" value="" disabled selected>Khu</option>
                            @foreach ($khu as $value){
                            <option class="select-option" value="{{$value->id}}">{{$value->khu}}</option>

                            }
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control-select" id="tang" required>
                            <option class="select-option" value="" disabled selected>Tầng</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control-select" id="phong" required>
                            <option class="select-option" value="" disabled selected>Phòng</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <select class="form-control-select" id="giuong" required>
                            <option class="select-option" value="" disabled selected>Giường trống</option>

                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-message">
                        <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                    </div>
                </form>
                <!-- end of call me form -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-1 -->
<!-- end of call me -->
