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
    public function suadiennam($id)
    {
        # code...
        $sua = Dien::find($id);
        if ($sua) {
            # code...
            return view('quan-ly.view.diennuoc.khunam.suadiennam', ['suadiennam' => $sua]);
        }else {
            # code...
            return redirect()->back();
        }
    }
    public function postsuadiennam(Request $request, $id)
    {
        $sua = Dien::find($id);
        $sua->soDienDauThang = $request->dientruoc;
        $sua->soDienCuoiThang = $request->dien;
        $sua->tongtien = ($request->dien - $request->dientruoc) * 3;
        $sua->save();
        return redirect('quan-ly/dien-nuoc/khu-nam/dien/sua/'.$id);
       
    }
    public function suanuocnam($id)
    {
        # code...
        $sua = Nuoc::find($id);
        if ($sua) {
            # code...
            return view('quan-ly.view.diennuoc.khunam.suanuocnam', ['suadiennam' => $sua]);
        }else {
            # code...
            return redirect()->back();
        }
    }
    public function postsuanuocnam(Request $request, $id)
    {
        $sua = Nuoc::find($id);
        $sua->soNuocDauThang = $request->dientruoc;
        $sua->soNuocCuoiThang = $request->dien;
        $sua->tongtien = ($request->dien - $request->dientruoc) * 5;
        $sua->save();
        return redirect('quan-ly/dien-nuoc/khu-nu/nuoc/sua/'.$id);
       
    }
    public function suadiennu($id)
    {
        # code...
        $sua = Dien::find($id);
        if ($sua) {
            # code...
            return view('quan-ly.view.diennuoc.khunu.suadiennu', ['suadiennam' => $sua]);
        }else {
            # code...
            return redirect()->back();
        }
    }
    public function postsuadiennu(Request $request, $id)
    {
        $sua = Dien::find($id);
        $sua->soDienDauThang = $request->dientruoc;
        $sua->soDienCuoiThang = $request->dien;
        $sua->tongtien = ($request->dien - $request->dientruoc) * 3;
        $sua->save();
        return redirect('quan-ly/dien-nuoc/khu-nu/dien/sua/'.$id);
       
    }
    public function suanuocnu($id)
    {
        # code...
        $sua = Nuoc::find($id);
        if ($sua) {
            # code...
            return view('quan-ly.view.diennuoc.khunu.suanuocnu', ['suadiennam' => $sua]);
        }else {
            # code...
            return redirect()->back();
        }
    }
    public function postsuanuocnu(Request $request, $id)
    {
        $sua = Nuoc::find($id);
        $sua->soNuocDauThang = $request->dientruoc;
        $sua->soNuocCuoiThang = $request->dien;
        $sua->tongtien = ($request->dien - $request->dientruoc) * 5;
        $sua->save();
        return redirect('quan-ly/dien-nuoc/khu-nam/nuoc/sua/'.$id);
       
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
