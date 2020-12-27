<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;
use App\Models\SinhVien;
use App\Models\VerifySV;
class regisSV
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
        
        if (Auth::guard('sinh_vien')->check()) {
            # code...
            if ( Auth::guard('sinh_vien')->user()->verified == 1) {
                # code...
                return $next($request);
            }else {
                # code...
               return redirect('dang-ki');
            }
        }else {
            # code...
            return redirect('dang-nhap')->with('nologin', 'Bạn chưa đăng nhập');
        }
    }
}
