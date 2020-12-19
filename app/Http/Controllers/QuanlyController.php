<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
