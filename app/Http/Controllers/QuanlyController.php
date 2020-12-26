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
use Carbon;
use View;
class QuanlyController extends Controller
{
    //
    public function index()
    {
        # code...
        $sinhvien = SinhVien::where('id_giuong', '!=', 'null')->count();
        $nguoithue = Thue::where('id_giuong', '!=', 'null')->count();

        $tongtaikhoan = SinhVien::all()->count() + Thue::all()->count();

        $truongtang = SinhVien::where('quyen', 1)->get();
        return view('quan-ly.view.dashboard', [
            'truong_tang' => $truongtang,
            'sinhvien' => $sinhvien,
            'thue' => $nguoithue,
            'tongtaikhoan' =>  $tongtaikhoan,
            ]);
    }
    public function tongsinhvien()
    {
        # code...
        $tongsinhvien = SinhVien::all();
        $demsinhvien = SinhVien::count();
        return view('quan-ly.view.sinhvien.sinhvien', [
            'tongsinhvien' => $tongsinhvien,
            'demsinhvien' => $demsinhvien,
            ]);
    }
    public function tongnguoithue()
    {
        # code...
        $tongsinhvien = Thue::all();
        $demsinhvien = Thue::count();
        return view('quan-ly.view.sinhvien.nguoithue', [
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

            ]
        );
        if ($request->position == 1) {
            # code...
            $this->validate($request, 
                [
                    'email' => 'bail|unique:sinhvien,Email|min:10|max:100',
                    'CMND' => 'bail|unique:sinhvien,CMND|min:9|max:12',
                    'phone'  => 'bail|unique:sinhvien,SDT|min:1|max:10',
                    'MSSV' => 'bail|min:4|max:8',
                    'class' => 'bail|min:4|max:5',
                    
                ],
                [
                    'email.min' => 'Vui lòng nhập đúng email',
                    'email.max' => 'Nhập email dưới 100 ký tự',
                    'email.unique' => 'Email đã tồn tại',
                    'phone.unique' => 'Số điện thoại đã tồn tại',
                    'phone.min' => 'Vui lòng nhập đúng số điện thoại',
                    'phone.max' => 'Vui lòng nhập đúng số điện thoại',
                    'CMND.unique' => 'Chứng minh nhân dân hoặc thẻ căn cước đẫ tồn tại',
                    'CMND.min' => 'Vui lòng nhập đúng chứng minh nhân dân hoặc thẻ căn cước',
                    'CMND.max' => 'Vui lòng nhập đúng chứng minh nhân dân hoặc thẻ căn cước',
                    'class.min' => 'Vui lòng nhập đúng lớp',
                    'class.max' => 'Vui lòng nhập đúng lớp',
                    'MSSV.min' => 'Vui lòng nhập đúng mã số sinh viên',
                    'MSSV.max' => 'Vui lòng nhập đúng mã số sinh viên',
                    
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
                $sinhvien->id_giuong = $request->giuong;
                $sinhvien->SDT = $request->phone;
                $sinhvien->Email = $request->email;
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
                $sinhvien->save();
                $giuong = Giuong::find($request->giuong);
                $giuong->hoatdong = 1;
                $giuong->save();
                $phong = Phong::find($request->phong);
                $phong->hoatdong = 1;
                $phong->save();
                return redirect('quan-ly/sinh-vien')->with('themthanhcong', 'Thêm sinh viên '.$sinhvien->Ten.' thành công');
            }
            else{
                return redirect()->back()->with('loituychon', 'Nhập lại mật khẩu không khớp');
            }
        }else if($request->position == 2){
           
            $this->validate($request, 
                [
                    'email' => 'bail|unique:thue,Email|min:10|max:100',
                    'CMND' => 'bail|unique:thue,CMND|min:9|max:12',
                    'phone'  => 'bail|unique:thue,SDT|min:1|max:10',
                    
                ],
                [
                    'email.min' => 'Vui lòng nhập đúng email',
                    'email.max' => 'Nhập email dưới 100 ký tự',
                    'email.unique' => 'Email đã tồn tại',
                    'phone.unique' => 'Số điện thoại đã tồn tại',
                    'phone.min' => 'Vui lòng nhập đúng số điện thoại',
                    'phone.max' => 'Vui lòng nhập đúng số điện thoại',
                    'CMND.unique' => 'Chứng minh nhân dân hoặc thẻ căn cước đẫ tồn tại',
                    'CMND.min' => 'Vui lòng nhập đúng chứng minh nhân dân hoặc thẻ căn cước',
                    'CMND.max' => 'Vui lòng nhập đúng chứng minh nhân dân hoặc thẻ căn cước',
                    
                ]
            );
            if ($request->password == $request->repassword) {
                # code...
                $thue = new Thue();
                $thue->Ten = $request->name;
                $thue->CMND = $request->CMND;
                $thue->QueQuan = $request->quequan;
                $thue->id_giuong = $request->giuong;
                $thue->SDT = $request->phone;
                $thue->Email = $request->email;
                $thue->password = bcrypt($request->repassword);
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
                                $thue->avatar = $avatarNem;
                        }else {
                            # code...
                            return redirect()->back()->with('thongbaoimg', 'Lựa chọn ảnh nào bé hơn 8MB');
                        }
                    }else {
                        # code...
                        return redirect()->back()->with('thongbaoimg', 'Fie bạn đưa lên không phải file ảnh');
                    }

                }
                $thue->save();
                $giuong = Giuong::find($request->giuong);
                $giuong->hoatdong = 1;
                $giuong->save();
                $phong = Phong::find($request->phong);
                $phong->hoatdong = 1;
                $phong->save();
                return redirect('quan-ly/sinh-vien')->with('themthanhcong', 'Thêm người thuê '.$thue->Ten.' thành công');
            }
            else{
                return redirect()->back()->with('loituychon', 'Nhập lại mật khẩu không khớp');
            }

        }else {
            # code...
            return redirect()->back()->with('loituychon', 'Bạn chưa chọn sinh viên hay người thuê');

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
    public function xoanguoithue($id)
    {
        # code...
        $thue = Thue::find($id);
        if ($thue->id_giuong > 0) {
            # code...
            $giuong = Giuong::where('id', $thue->id_giuong)->first();
            $giuong->hoatdong = 0;
            $giuong->save();
        }
        $thue->delete();
   
        return redirect('quan-ly/sinh-vien')->with('themthanhcong', 'Xóa sinh viên '.$thue->Ten.' thành công');

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
    function __construct()
    {
        # code...
        $page = Page::find(1);
        // $pageoff = $page->status
        View::share('pageoff', $page);
    }
}
