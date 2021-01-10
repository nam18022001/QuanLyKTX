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
use App\Models\ThongBaoFile;
use App\Models\ThongBaoSV;
use Carbon\Carbon;
use View;
class DienNuocController extends Controller
{
    //
    public function dien()
    {
        # code...
        if (Auth::guard('sinh_vien')->user()->id_giuong > 0) {
            # code...
            $id =  Auth::guard('sinh_vien')->user()->giuong->phong->tiendien->id;
            $dien = Dien::find($id);
            return view('page.view.sinhvien.view.diennuoc.dien', ['dien' => $dien]);

        }else {
            # code...
            return redirect('');
        }
    }
    public function nuoc()
    {
        # code...
        if (Auth::guard('sinh_vien')->user()->id_giuong > 0) {
            # code...
            $id =  Auth::guard('sinh_vien')->user()->giuong->phong->tiendien->id;
            $nuoc = Nuoc::find($id);
            return view('page.view.sinhvien.view.diennuoc.nuoc', ['nuoc' => $nuoc]);

        }else {
            # code...
            return redirect('');
        }
    }

    public function qlnuocnam()
    {
            $nuoc = Nuoc::where('id_khu', 1)->get();
            
            return view('quan-ly.view.diennuoc.khunam.nuoc', ['nuoc' => $nuoc]);
    }

    public function qldiennam()
    {
            $dien = Dien::where('id_khu', 1)->get();
            return view('quan-ly.view.diennuoc.khunam.dien', ['dien' => $dien]);
    }
    
    public function qlnuocnu()
    {
            $nuoc = Nuoc::where('id_khu', 2)->get();
            
            return view('quan-ly.view.diennuoc.khunu.nuoc', ['nuoc' => $nuoc]);
    }

    public function qldiennu()
    {
            $dien = Dien::where('id_khu', 2)->get();
            return view('quan-ly.view.diennuoc.khunu.dien', ['dien' => $dien]);
    }

    function __construct()
    {
        # code...
        $page = Page::find(1);
        // $pageoff = $page->status
        View::share('pageoff', $page);
    }
}
