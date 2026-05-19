<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FrontAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('username')) {
            return redirect('/auth/login');
        }
        return $next($request);
    }
}
