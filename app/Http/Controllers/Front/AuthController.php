<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\MemberLevel;
use App\Models\Referral;
use App\Models\UserVerification;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class AuthController extends Controller
{
    public function index()
    {
        if (session('username')) {
            return redirect('/journey');
        }
        return redirect('/auth/login');
    }

    public function login()
    {
        if (session('username')) {
            return redirect('/journey');
        }
        $settings = SystemSetting::first();
        return view('front.login', ['query' => $settings]);
    }

    public function loginPost(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = Member::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            if ($user->status == 0) {
                return response()->json(['status' => false, 'message' => 'Your account has been suspended']);
            }

            session([
                'username' => $user->username,
                'id' => $user->id,
                'memberLevel' => $user->memberLevel,
            ]);

            Member::where('id', $user->id)->update(['lastLongInTime' => time()]);

            return response()->json(['status' => true, 'message' => 'Login Successful']);
        }

        return response()->json(['status' => false, 'message' => 'Invalid Username or Password']);
    }

    public function signup()
    {
        if (session('username')) {
            return redirect('/journey');
        }
        $settings = SystemSetting::first();
        $code = request()->query('code', '');
        return view('front.signup', ['query' => $settings, 'code' => $code]);
    }

    public function signupPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'invitation_code' => 'required',
            'phone_number' => 'required',
        ]);

        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $invitationCode = $request->input('invitation_code');
        $phoneNumber = $request->input('phone_number');

        $existingUser = Member::where('username', $username)->first();
        if ($existingUser) {
            return response()->json(['status' => false, 'message' => 'Username already exists']);
        }

        $referrer = Member::where('myCode', $invitationCode)->first();
        if (!$referrer) {
            return response()->json(['status' => false, 'message' => 'Invalid invitation code']);
        }

        $settings = SystemSetting::first();
        $level = MemberLevel::first();
        $uniqueCode = self::generateUniqueCode();

        $qrPath = 'assets/qrcode/';
        if (!file_exists(public_path($qrPath))) {
            mkdir(public_path($qrPath), 0777, true);
        }
        $qrImage = $qrPath . $uniqueCode . '.png';
        $text = url('/') . '?code=' . $uniqueCode;

        try {
            $qrCodeObj = new QrCode($text);
            $writer = new PngWriter();
            $result = $writer->write($qrCodeObj);
            $result->saveToFile(public_path($qrImage));
        } catch (\Exception $e) {
            // QR code generation failed silently
        }

        $member = Member::create([
            'qrImage' => $qrImage,
            'username' => $username,
            'email' => 'null',
            'password' => $password,
            'phN' => $phoneNumber,
            'balance' => 0,
            'avalibleDailyOrders' => $level->orderReciveLimit ?? 0,
            'takeTodayOrders' => 0,
            'todaycommission' => 0,
            'credibility' => 100,
            'inviteCode' => $invitationCode,
            'myCode' => $uniqueCode,
            'status' => 1,
            'memberLevel' => 1,
            'frozenAmout' => 0,
            'grabOrder' => $level->ordersGrabbed ?? 0,
            'registrationTime' => time(),
            'lastLongInTime' => time(),
            'orderStatus' => 1,
            'withdrawalStatus' => 1,
            'paymentPassword' => Hash::make('000000'),
            'memberAgent' => 0,
            'taskStatus' => 0,
        ]);

        // Create referral relationship
        Referral::create([
            'referrer_id' => $referrer->id,
            'referred_id' => $member->id,
        ]);

        return response()->json(['status' => true, 'message' => 'Registration successful']);
    }

    public function signoff()
    {
        session()->flush();
        return redirect('/auth/login');
    }

    public function credentialcheck(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = Member::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }

    private static function generateUniqueCode()
    {
        do {
            $code = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
        } while (Member::where('myCode', $code)->exists());

        return $code;
    }
}
