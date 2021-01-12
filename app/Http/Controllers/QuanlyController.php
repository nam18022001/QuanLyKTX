<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Validator;
use File;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\Uppercase;

class QuanlyController extends Controller
{
    //
    public function index()
    {
        # code...
        $sinhvien = SinhVien::where([
            ['id_giuong', '!=', 'null'],
            ['verified', 1]
            
            ])->count();


        $tongtaikhoan = SinhVien::all()->count() + User::all()->count();
        $nguoithue = User::count();
        $truongtang = SinhVien::where('quyen', 1)->get();
        $thongbao = ThongBao::where('xoa', 1)->count();
        return view('quan-ly.view.dashboard', [
            'truong_tang' => $truongtang,
            'sinhvien' => $sinhvien,
            'thue' => $nguoithue,
            'tongtaikhoan' =>  $tongtaikhoan,
            'thongbao' => $thongbao,
            ]);
    }
    public function tongsinhvien()
    {
        # code...
        $tongsinhvien = SinhVien::where('verified', 1)->get();
        $demsinhvien = SinhVien::where('verified', 1)->count();
        return view('quan-ly.view.sinhvien.sinhvien', [
            'tongsinhvien' => $tongsinhvien,
            'demsinhvien' => $demsinhvien,
            ]);
    }
    
    public function suasinhvien($id)
    {
        # code...
        $sinhvien = SinhVien::find($id);
        $khu = Khu::all();
        $tang = Tang::all();
        $phong = Phong::all();
        $giuong = Giuong::all();
        return view('quan-ly.view.sinhvien.sua', [
            'sinhvien' => $sinhvien,
            'khu' => $khu,
            'tang' => $tang,
            'phong' => $phong,
            'giuong' => $giuong,
            ]);
    }
    public function postsuasinhvien(Request $request, $id)
    {
        // # code...
        $sinhvien = SinhVien::find($id);
        $giuong = Giuong::find($sinhvien->id_giuong);
        $giuong->hoatdong = 0;
        $giuong->save();
        $sinhvien->id_giuong = $request->giuong;
        $sinhvien->quyen = $request->quyen;
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
                $this->validate($request, 
                    [
                    
                        'password' => 'bail|min:3|max:100',
                    ],

                    [
                        'password.min' => 'Nhập mật khẩu lớn hơn 3 ký tự',
                        'password.max' => 'Nhập mật khẩu ít hơn 100 ký tự',

                    ]
                );
                if ($request->password == $request->repassword) {
                    # code...
                    $sinhvien->password = bcrypt($request->repassword);
                }else {
                    # code...
                    return redirect()->back()->with('thongbaoimg', 'Nhập lại mật khẩu không khớp');
                }
            }
                $giuong = Giuong::find($request->giuong);
                $giuong->hoatdong = 1;
                $giuong->save();
                $sinhvien->save();
                return redirect('quan-ly/sinh-vien')->with('themthanhcong', 'Sửa sinh viên '.$sinhvien->Ten.' thành công');
    }
    public function themsinhvien()
    {
        # code...
        $khu = Khu::all();
        return view('quan-ly.view.sinhvien.themsinhvien',
        ['khu' => $khu]
    );
    }

    public function postthemsinhvien(Request $request)
    {
        $this->validate($request, 
            [
                'name' => 'bail|string|min:5|max:100',
                'quequan' => 'bail|string|min:3|max:100',
                'password' => 'bail|min:3|max:100',
                'CMND' => 'bail|unique:sinhvien,CMND|min:9|max:12',
                'phone'  => 'bail|unique:sinhvien,SDT|min:1|max:10',
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

                 if (!empty($request->giuong)) {
                    # code...
                    $sinhvien->id_giuong = $request->giuong;

                    $giuong = Giuong::find($request->giuong);
                    $giuong->hoatdong = 1;
                    $giuong->save();
                    $phong = Phong::find($request->phong);
                    $phong->hoatdong = 1;
                    $phong->save();

                }
                $sinhvien->save();
                return redirect('quan-ly/sinh-vien')->with('themthanhcong', 'Thêm sinh viên '.$sinhvien->Ten.' thành công');
            }
            else{
                return redirect()->back()->with('loituychon', 'Nhập lại mật khẩu không khớp');
            }

    }
    public function xoasinhvien($id)
    {
        # code...
        $sinhvien = SinhVien::find($id);
        if ($sinhvien->id_giuong > 0) {
            # code...
            $giuong = Giuong::where('id', $sinhvien->id_giuong)->first();
            $giuong->hoatdong = 0;
            $giuong->save();
        }
        $sinhvien->delete();
   
        return redirect('quan-ly/sinh-vien')->with('themthanhcong', 'Xóa sinh viên '.$sinhvien->Ten.' thành công');

    }

    public function sinhviennam($id)
    {
        # code...
        $giuong = Giuong::where('id_phong', $id)->get();
        $phong = Giuong::where('id_phong', $id)->get()->first();

        return view('quan-ly.view.namsinhvientrongphong', [
            'sinhvien' => $giuong,
            'phong' => $phong,
        ]);
    }
    public function sinhviennu($id)
    {
        # code...
        $giuong = Giuong::where('id_phong', $id)->get();
        $phong = Giuong::where('id_phong', $id)->get()->first();

        return view('quan-ly.view.nusinhvientrongphong', [
            'sinhvien' => $giuong,
            'phong' => $phong,
        ]);
    }
    public function phongnam($id)
    {
        # code...
        // $tang = Tang::find($id);
        $phong = Phong::where('id_tang', $id)->get();
        return view('quan-ly.view.phongnam', ['phong' => $phong]);
    }
    public function phongnu($id)
    {
        # code...
        // $tang = Tang::find($id);
        $phong = Phong::where('id_tang', $id)->get();
        return view('quan-ly.view.phongnu', ['phong' => $phong]);
    }

    public function quanlyphongnam()
    {
        # code...
        $khu = Khu::find(1);
        return view('quan-ly.view.tangnam', ['khu' => $khu]);
    }
    public function quanlyphongnu()
    {
        # code...
        $khu = Khu::find(2);
        return view('quan-ly.view.tangnu', ['khu' => $khu]);
    }

    public function danhsachquanly()
    {
        # code...
        $quanly = User::all();
        return view('quan-ly.view.quanly.quanly', ['quanly' => $quanly]);
    }
    public function xoaquanly($id)
    {
        # code...
        if (Auth::user()->position == 1) {
            # code...
            $xoaquanly = User::find($id);
            if ($xoaquanly) {
                # code...
                $xoaquanly->delete();
                return redirect('quan-ly/danh-sach')->with('themthanhcong', 'Xóa thàng công '.$xoaquanly->name);
            }else {
                # code...
                return redirect('quan-ly/danh-sach')->with('loi', 'Xóa không thành công');

            }
           
        }else {
            # code...
            return redirect('quan-ly/danh-sach')->with('loi', 'Bạn không có quyền vào đây');
        }
    }
    public function suaquanly($id)
    {
        # code...
        if (Auth::user()->position == 1) {
            # code...
            $suaquanly = User::find($id);
            if ($suaquanly) {
                # code...
                return view('quan-ly.view.quanly.sua', ['sua' => $suaquanly]);
            }else {
                # code...
                return redirect('quan-ly/danh-sach')->with('loi', 'Sửa không thành công');

            }
           
        }else {
            # code...
            return redirect('quan-ly/danh-sach')->with('loi', 'Bạn không có quyền vào đây');
        }
    }
    public function postsuaquanly(Request $request, $id)
    {
        # code...
        if (Auth::user()->position == 1) {
            # code...
            $sua = User::find($id);
            if ($sua) {
                # code...

                if ($request->mu == 'on') {
                    # code...
                    
                    $this->validate($request,[
                        'password' => 'bail|required|between:3,50|',
                    ],[
                        'password.between' => 'Vui lòng nhập mật khẩu lớn hơn 3 ký tự và bé hơn 50 ký tự',
                        'password.required' => 'Vui lòng nhập mật khẩu',
                    ]);
                    if ($request->password == $request->repassword) {
                        # code...
                        $sua->password = bcrypt($request->repassword);
                    }
                }else{
                    return redirect('quan-ly/sua', $id)->with('loi', 'Nhập lại mật khẩu không khớp');
                }
                
                $sua->position = $request->quyen;

                $sua->save();

                return redirect('quan-ly/danh-sach')->with('themthanhcong', 'Cập nhật thành công '.$sua->name);

            }else {
                # code...
                return redirect('quan-ly/danh-sach')->with('loi', 'Sửa không thành công');
            }
        }else {
            # code...
            return redirect('quan-ly/danh-sach')->with('loi', 'Bạn không có quyền vào đây');
        }
    }
    public function themquanly()
    {
        # code...

        if (Auth::user()->position == 1) {
            # code...

            return view('quan-ly.view.quanly.them');
        }else {
            # code...
            return redirect('quan-ly/danh-sach')->with('loi', 'Bạn không có quyền vào đây');
        }
    }
    public function postthemquanly(Request $request)
    {
        # code...
        $this->validate($request, 
            [
                'name' => 'bail|string|min:5|max:100',
                'QueQuan' => 'bail|string|min:3|max:100',
                'password' => 'bail|min:3|max:100',
                'CMND' => 'bail|unique:users,CMND|min:9|max:12',
                'phone'  => 'bail|unique:users,SDT|min:1|max:10',
                'email' => 'bail|unique:users,email|between:10,110',
                'quyen' => 'bail|required',
            ],

            [
                'name.string' => ' Vui lòng nhập đúng tên',
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
                'email.unique' => 'Email đã tồn tại',
                'email.between' => 'Vui lòng nhập email hơn 10 ký tự và ít hơn 100 ký tự',
                'quyen.required' => 'Vui lòng chọn quyền'
            ]
        );

        if ($request->password == $request->repassword) {
            # code...
            $them = new User();
            $them->name = $request->name;
            $them->email = $request->email;
            $them->QueQuan = $request->QueQuan;
            $them->SDT = $request->phone;
            $them->CMND = $request->CMND;
            $them->password = bcrypt($request->repassword);
            $them->position = $request->quyen;
            if ($request->hasFile('file')) {
                # code...
                $avatar = $request->file('file');
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
                        $them->avatar = $avatarNem;
                    }else {
                        # code...
                        return redirect('quan-ly/them')->with('thongbaoimg', 'Lựa chọn ảnh nào bé hơn 8MB');
                    }
                }else {
                    # code...
                    return redirect('quan-ly/them')->with('thongbaoimg', 'Fie bạn đưa lên không phải file ảnh');
                }
            }

            $them->save();
            return redirect('quan-ly/danh-sach')->with('themthanhcong', 'Thêm thành công '. $request->name);
        }else{
            return redirect('quan-ly/them')->with('loi', 'Nhập lại mật khẩu không khớp');
        }
    }
    public function changepass($id)
    {
        # code...
        if (Auth::id() == $id) {
            # code...
            $user = User::find($id);
            return view('quan-ly.view.hoso', ['quanly' => $user]);
        }else {
            # code...
            return redirect()->back();
        }
    }
    public function postchangepass(Request $request, $id)
    {
        # code...
        $this->validate($request, 
            [
                'QueQuan' => 'bail|string|min:3|max:100',
                'password' => 'bail|min:3|max:100',
                'phone'  => 'bail|min:1|max:10',
            ],

            [
                
                'quequan.string' => 'Vui lòng nhập đúng quê quán',
                'quequan.min' => 'Nhập quê quán trên 3 ký tự',
                'quequan.max' => 'Nhập quê quán dưới 100 ký tự',
                'password.min' => 'Nhập mật khẩu lớn hơn 3 ký tự',
                'password.max' => 'Nhập mật khẩu ít hơn 100 ký tự',
                'phone.min' => 'Vui lòng nhập đúng số điện thoại',
                'phone.max' => 'Vui lòng nhập đúng số điện thoại',
            ]
        );
        $user = User::find($id);
        if (Hash::check($request->passwordold, $user->password)) {
            # code...
            if ($request->password == $request->repassword) {
                # code...
                $user->password = bcrypt($request->repassword);
                $user->SDT = $request->phone;
                $user->QueQuan = $request->QueQuan;
                if ($request->hasFile('file')) {
                    # code...
                    $avatar = $request->file('file');
                    $avatarType = $avatar->extension();
                    if ($avatarType == 'jpg' || $avatarType == 'png' || $avatarType == 'gif' || $avatarType == 'jpeg') {
                        # code...
                        File::delete('admin_assets/upload/'.$user->avatar);
                        if ($avatar->getSize() < 8388608) {
                            # code...
                            $avatarName = $avatar->getClientOriginalName();
                            $avatarNem = Str::random(5).'-'.$avatarName;
                            while (file_exists('admin_asets/upload/'.$avatarNem)) {
                                # code...
                                $avatarNem = Str::random(5).'-'.$avatarName;
                            }
                            $avatar->move('admin_assets/upload/', $avatarNem);
                            $user->avatar = $avatarNem;
                        }else {
                            # code...
                            return redirect('quan-ly/doi-mat-khau/'.$id)->with('thongbaoimg', 'Lựa chọn ảnh nào bé hơn 8MB');
                        }
                    }else {
                        # code...
                        return redirect('quan-ly/doi-mat-khau/'.$id)->with('thongbaoimg', 'Fie bạn đưa lên không phải file ảnh');
                    }
                }
    
                $user->save();
                return redirect('quan-ly/doi-mat-khau/'.$id)->with('themthanhcong', 'Sửa thành công');
            }
            else {
            return redirect('quan-ly/doi-mat-khau/'.$id)->with('loi', 'Nhập lại mật khẩu không khớp');

            }
        }else{
            return redirect('quan-ly/doi-mat-khau/'.$id)->with('loi', 'Mật khẩu cũ không khớp');
        }
    }
    function __construct()
    {
        # code...
        $page = Page::find(1);
        // $pageoff = $page->status
        View::share('pageoff', $page);
    }
}
