<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class adminlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            # code...
            if (Auth::user()->position == 1 || Auth::user()->position == 2) {
                # code...
                return $next($request);
            }else{
                return redirect('quan-ly/dang-nhap')->with('positionlogin', 'Bạn không có quyền vào đây');
            }
        }else {
            # code...
            return redirect('quan-ly/dang-nhap')->with('nologin', 'Bạn chưa đăng nhập');
        }
        
    }
}
