<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Khu;
use App\Models\SinhVien;
use App\Models\Thue;
use App\Models\VerifySV;
use App\Models\VerifyThue;
use Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use Auth;
class UserController extends Controller
{
    //
    public function regis()
    {
        # code...
        $khu = Khu::all();
        return view('page.view.regis', ['khu' => $khu]);
    }
    public function postregis(Request $request)
    {
        # code...
        
        $this->validate($request, 
            [
                'name' => 'bail|string|min:5|max:100',
                'quequan' => 'bail|string|min:3|max:100',
                'password' => 'bail|min:3|max:100',
                'CMND' => 'bail|unique:sinhvien,CMND|unique:thue,CMND|min:9|max:12',
                'phone'  => 'bail|unique:sinhvien,SDT|unique:thue,SDT|min:1|max:10',
            ],

            [
                'name.string' => ' Vui lòng nhập đúng tên của mình',
                'name.min' => 'Vui lòng nhập cả họ và tên',
                'name.max' => 'Nhập họ tên dưới 100 ký tự',
                'quequan.string' => 'Vui lòng nhập đúng quê quán',
                'quequan.min' => 'Nhập quê quán trên 3 ký tự',
                'quequan.max' => 'Nhập quê quán dưới 100 ký tự',
                'password.min' => 'Nhập mật khẩu lớn hơn 3 ký tự',
                'password.max' => 'Nhập mật khẩu ít hơn 100 ký tự',
                'phone.unique' => 'Số điện thoại đã tồn tại',
                'phone.min' => 'Vui lòng nhập đúng số điện thoại',
                'phone.max' => 'Vui lòng nhập đúng số điện thoại',
                'CMND.unique' => 'Chứng minh nhân dân hoặc thẻ căn cước đẫ tồn tại',
                'CMND.min' => 'Vui lòng nhập đúng chứng minh nhân dân hoặc thẻ căn cước',
                'CMND.max' => 'Vui lòng nhập đúng chứng minh nhân dân hoặc thẻ căn cước',
            ]
        );
        if ($request->position == 1) {
            # code...
            $this->validate($request, 
                [

                    'email' => 'bail|ends_with:@vku.udn.vn|unique:sinhvien,email|min:10|max:100',
                    'MSSV' => 'bail|min:4|max:8',
                    'class' => 'bail|min:4|max:5',
                    
                ],
                [
                    
                    'class.min' => 'Vui lòng nhập đúng lớp',
                    'class.max' => 'Vui lòng nhập đúng lớp',
                    'MSSV.min' => 'Vui lòng nhập đúng mã số sinh viên',
                    'MSSV.max' => 'Vui lòng nhập đúng mã số sinh viên',
                    'email.min' => 'Vui lòng nhập đúng email',
                    'email.max' => 'Nhập email dưới 100 ký tự',
                    'email.unique' => 'Email đã tồn tại',
                    'email.ends_with' => 'Bạn chọn sinh viên nhưng không đúng email',
                    
                ]
            );
            if ($request->password == $request->repassword) {
                # code...
                $sinhvien = new SinhVien();
                $sinhvien->Ten = $request->name;
                $sinhvien->Lop = $request->class;
                $sinhvien->MSSV = $request->MSSV;
                $sinhvien->CMND = $request->CMND;
                $sinhvien->QueQuan = $request->quequan;
                $sinhvien->SDT = $request->phone;
                $sinhvien->email = $request->email;
                $sinhvien->password = bcrypt($request->repassword);
                    if ($request->hasFile('avatar')) {
                        # code...
                        $avatar = $request->file('avatar');
                        $avatarType = $avatar->extension();
                        if ($avatarType == 'jpg' || $avatarType == 'png' || $avatarType == 'gif' || $avatarType == 'jpeg') {
                            # code...
                            if ($avatar->getSize() < 8388608) {
                                # code...
                                $avatarName = $avatar->getClientOriginalName();
                                $avatarNem = Str::random(5).'-'.$avatarName;
                                while (file_exists('admin_asets/upload/'.$avatarNem)) {
                                    # code...
                                    $avatarNem = Str::random(5).'-'.$avatarName;
                                }
                                $avatar->move('admin_assets/upload/', $avatarNem);
                                $sinhvien->avatar = $avatarNem;
                        }else {
                            # code...
                            return redirect()->back()->with('thongbaoimg', 'Lựa chọn ảnh nào bé hơn 8MB');
                        }
                    }else {
                        # code...
                        return redirect()->back()->with('thongbaoimg', 'Fie bạn đưa lên không phải file ảnh');
                    }

                }
                if ($request->mu == 'on') {
                    # code...
                    $sinhvien->id_giuong = $request->giuong;

                    $giuong = Giuong::find($request->giuong);
                    $giuong->hoatdong = 1;
                    $giuong->save();
                    $phong = Phong::find($request->phong);
                    $phong->hoatdong = 1;
                    $phong->save();
                }
                $sinhvien->verified = 0;
                $sinhvien->save();

                    Auth::guard('sinh_vien')->attempt(['email' => $request->email, 'password' => $request->password]);
                    # code...
                    $sendmail = new VerifySV();
                    $sendmail->id_sv = Auth::guard('sinh_vien')->user()->id;
                    $sendmail->token = sha1(time());
                    $sendmail->save();

                    $data = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'token' => $sendmail->token,
                    ];
                    $email = $request->email;
                    $name = $request->name;
                    
                    Mail::to($request->email)
                        ->cc('hnvnam.19it3@vku.udn.vn')
                        ->bcc('hnvnam.19it3@vku.udn.vn')
                        ->send(new VerifyMail($sendmail));
                
                    
                return view('page.view.mail.verify');
                
            }else {
                # code...
                return redirect('dang-ki')->with('loi', 'Nhập lại mật khẩu không khớp');
            }
        }elseif ($request->position == 2) {


        }else {
            # code...
            return redirect('dang-ki')->with('loi', 'Bạn là sinh viên hay người muốn thuê ?');
        }
    }
    public function login()
    {
        # code...
        return view('page.view.login');
    }
  
        # code...
        public function postlogin(Request $request)
    {
        # code...
        if (Auth::guard('sinh_vien')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            # code...
            // return redirect('/');

        }elseif (Auth::guard('nguoi_thue')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                # code...    
                // return redirect('/');
            
        }else{
            return redirect('dang-nhap')->with('loginfail', 'Sai email hoặc mật khẩu');
        }
    }
    public function logout()
    {
        # code...
        if (Auth::guard('sinh_vien')->check()) {
            # code...
            Auth::guard('sinh_vien')->logout();
        }else {
            # code...
            Auth::guard('nguoi_thue')->logout();

        }
        
        return view('page.view.login');
    }
}
