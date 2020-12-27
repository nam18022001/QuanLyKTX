<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;
use App\Models\Thue;
use App\Models\VerifyThue;
class regisThue
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
        return $next($request);
    }
}
