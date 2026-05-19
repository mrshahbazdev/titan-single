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

        // OTP Bypass: Automatically create or update the verification record to verified state
        $userId = session('id');
        $check = UserVerification::where('user_id', $userId)->first();
        if (!$check) {
            UserVerification::create([
                'user_id' => $userId,
                'phone_number' => '+923000000000',
                'otp_code' => '123456',
                'is_verified' => 1
            ]);
        } elseif ($check->is_verified != 1) {
            UserVerification::where('user_id', $userId)->update([
                'is_verified' => 1
            ]);
        }

        return $next($request);
    }
}
