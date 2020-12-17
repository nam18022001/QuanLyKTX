<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\User;
use View;
use Auth;
class AdminController extends Controller
{
    //
    public function logout()
    {
        # code...
        Auth::logout();
        return redirect('quan-ly/dang-nhap');
    }
    public function login()
    {
        # code...
        return view('quan-ly.view.login');
    }

    public function postlogin(Request $request)
    {
        # code...
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            # code...
            return redirect('quan-ly');
        }else{
            return redirect()->back()->with('loginfail', 'Sai email hoặc mật khẩu');
        }
    }
    
    public function off()
    {
        # code...
        $shutdown = Page::find(1);
        if ($shutdown->status == 0) {
            # code...
            return view('offwebsite');

        }else {
            # code...
            return redirect('/');
        }
    }
    public function shutdown()
    {
        # code...
        $shutdown = Page::find(1);
        $shutdown->status = 0;
        $shutdown->save();
        
        return redirect('dang-bao-tri');
    }
    public function shutup()
    {
        # code...
        $shutdown = Page::find(1);
        $shutdown->status = 1;
        $shutdown->save();
        
        return redirect('/');
    }
    
}

