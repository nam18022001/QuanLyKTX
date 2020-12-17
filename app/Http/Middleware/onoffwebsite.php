<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Page;
use Auth;
class onoffwebsite 
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
        
        $off = Page::find(1);
        if ($off->status == 1) {
            # code...
            return $next($request);

        }else {
            # code...
            return redirect('dang-bao-tri');
        }
    }
}
