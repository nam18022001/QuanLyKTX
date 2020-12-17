<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tang;
use App\Models\Khu;
use App\Models\Giuong;
use App\Models\Phong;
use App\Models\Page;
use View;
class QuanlyController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('quan-ly.view.dashboard');
    }
    public function quanlyphongnam()
    {
        # code...
        $khu = Khu::find(1);
        return view('quan-ly.view.phongnam', ['khu' => $khu]);
    }
    public function quanlyphongnu()
    {
        # code...
        $khu = Khu::find(2);
        return view('quan-ly.view.phongnu', ['khu' => $khu]);
    }
    function __construct()
    {
        # code...
        $page = Page::find(1);
        // $pageoff = $page->status
        View::share('pageoff', $page);
    }
}
