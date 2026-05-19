<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserVerification;

class VerifiedUser
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('username')) {
            return redirect('/auth/login');
        }

        $check = UserVerification::where('user_id', session('id'))
            ->where('is_verified', 1)
            ->first();

        if (!$check) {
            return redirect('/verification/send_otp');
        }

        return $next($request);
    }
}
