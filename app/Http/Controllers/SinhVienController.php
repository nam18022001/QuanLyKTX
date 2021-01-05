<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use App\Models\Tang;
use App\Models\Khu;
use App\Models\Giuong;
use App\Models\Phong;
use App\Models\Page;
use App\Models\SinhVien;
use App\Models\Thue;
use App\Models\Dien;
use App\Models\Nuoc;
use App\Models\User;
use App\Models\ThongBao;
use Carbon;
use View;
class SinhVienController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('page.view.sinhvien.view.index');
    }
    public function mailbox()
    {
        # code...
        return view('page.view.sinhvien.view.Mail.index');
    }
    public function mailsend()
    {
        # code...
        return view('page.view.sinhvien.view.Mail.sendmail');
    }
    public function postmailsend(Request $request)
    {
        # code...
        $this->validate($request, 
            [
                'tieude' => 'bail|between:5,100'
            ],
            [
                'tieude.between' => 'Vui lòng nhâp tiêu đề lớn hơn 5 chữ và bé hơn 10 chữ'
            ]
        );
        $phananh = new ThongBao();
        $phananh->id_sinhvien = Auth::guard('sinh_vien')->id();
        $phananh->tieude = $request->tieude;
        $phananh->noidung = $request->noidung;
        $phananh->tomtat = $request->tomtat;
        $phananh->save();
        return redirect('thong-bao/da-gui');
    }
    public function mailread($id)
    {
        # code...
        return view('page.view.sinhvien.view.Mail.mailread');
    }

    public function sent()
    {
        # code...
        $sent = ThongBao::where([['id_sinhvien', Auth::guard('sinh_vien')->id()], ['xoa', 1]])->orderBy('created_at', 'desc')->paginate(5);
        
        return view('page.view.sinhvien.view.Mail.sent', ['sent' => $sent]);
    }
    public function xoasent(Request $request)
    {
        # code...
        $checked = $request->input('checked',[]);
        if ($checked != 'on' > 0)  {
            # code...
            $thongbao = ThongBao::whereIn("id", $checked)->update(['xoa' => 2]);
            $lenhxoa = ThongBao::where('xoa', 2)->get();
                foreach ($lenhxoa as $value) {
                    # code...
                    $del = Carbon\Carbon::now()->diffInMonths($value->updated_at).'</br>';
                    if ($del == 1) {
                        # code...
                        $value->delete();
                    }
                }
            return redirect('thong-bao/da-gui');
        }else {
            # code...
            return redirect('thong-bao/da-gui')->with('loi', 'Chọn ít nhất một một hộp thư để xóa');

        }
        
    }
    public function xoasentwid($id)
    {
        # code...
        $thongbao = ThongBao::find($id);
        $thongbao->xoa = 2;
        $thongbao->save();
        return redirect('thong-bao/da-gui');
        
    }
    public function searchmail(Request $request)
    {
        # code...
        if ($request->ajax()) {
            # code...
            
            $output = '';
            $thongbao = ThongBao::where([
                ['id_sinhvien', Auth::guard('sinh_vien')->id()], 
                ['xoa', 1],
                ['tieude', 'LIKE', '%'.$request->search.'%'],
            ])
            ->orWhere([
                ['id_sinhvien', Auth::guard('sinh_vien')->id()], 
                ['xoa', 1],
                ['tomtat', 'LIKE', '%'.$request->search.'%'],
            ])
            ->get();
            if ($thongbao) {
                # code...
                $i = 1;
                foreach ($thongbao as $key => $value) {
                    # code...
                    $u = $i++;
                    $output .= '
                <tr>
                <td>
                    <div class="icheck-primary">
                    <input type="checkbox" name="checked[]" value="'.$value->id.'" id="check'.$u.'">
                    <label for="check'.$u.'"></label>
                    </div>
                </td>
                <td class="mailbox-name"><a href="'.url('thong-bao/mail/da-gui', $value->id).'">'.$value->tieude.'</a></td>
                <td class="mailbox-subject"><p>'. $value->tomtat .'</p>
                </td>
                <td class="mailbox-attachment"></td>
                <td class="mailbox-date">'.$value->created_at->diffForHumans().'</td>
                </tr>
                ';
                }
            }
            return Response($output);
        }
        return redirect()->back(); 
    }
    public function mailsentread($id)
    {
        # code...
        $thongbao = ThongBao::find($id);
        return view('page.view.sinhvien.view.Mail.mailread', ['thongbao' => $thongbao]);
    }
    public function trash(){
        
    }
}
