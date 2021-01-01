<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Khu;
use App\Models\Tang;
use App\Models\Phong;
use App\Models\Giuong;
use App\Models\SinhVien;
use App\Models\VerifySV;
use Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;
use Auth;
use Carbon\Carbon;
class VerifyEmailController extends Controller
{
    //
    public function email()
    {
        # code...
        return view('page.view.mail.verify');
    }
    public function verify($token)
    {
        # code...
        $id = Auth::guard('sinh_vien')->id();

        $sinhvien = SinhVien::find($id);
        if ($sinhvien->verifysv->token == $token) {
            # code...
            $sinhvien->verified = 1;
            $sinhvien->email_verified_at = Carbon::now();
            $sinhvien->save();
            return view('page.view.mail.verified');
        }else {
            # code...
            return redirect('email')->with('loi', 'Xác thực không thành công');
        }
    }
    public function resend()
    {
        # code...
        if (Auth::guard('sinh_vien')->check() && Auth::guard('sinh_vien')->user()->verified != 1){
            # code...
            $sendmail = VerifySV::where('id_sv', Auth::guard('sinh_vien')->id())->first();
            $sendmail->token = sha1(time());
            $sendmail->save();
            $email = Auth::guard('sinh_vien')->user()->email;
            Mail::to($email)
                ->cc('hnvnam.19it3@vku.udn.vn')
                ->bcc('hnvnam.19it3@vku.udn.vn')
                ->send(new VerifyMail($sendmail));
            return redirect('email');
        }else {
            # code...
            return redirect('/');
        }
    }
}
