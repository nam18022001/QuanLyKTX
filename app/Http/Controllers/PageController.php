<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Giuong;
use App\Models\Phong;
use App\Models\Khu;
use Auth;
class PageController extends Controller
{
    //
    public function index()
    {
        # code...
        $khu = Khu::all();
        return view('page.layout.master_view', ['khu' => $khu]);
    }

    
}
