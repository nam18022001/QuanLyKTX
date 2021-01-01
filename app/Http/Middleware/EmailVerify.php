<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class EmailVerify
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
            if ( Auth::guard('sinh_vien')->user()->verified != 1) {
                # code...
                return $next($request);
            }else {
                # code...
               return redirect('/');
            }
        }else {
            # code...
            abort(404);

            // return redirect('dang-nhap')->with('nologin', 'Bạn chưa đăng nhập');
        }
    }
}
