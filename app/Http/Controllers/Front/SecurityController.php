<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;

class SecurityController extends Controller
{
    public function index()
    {
        $userName = session('username');
        $id = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['reward'] = TodayReward::where('userId', $id)->get()->toArray();
        return view('front.security', $data);
    }

    public function passchange(Request $request)
    {
        $userName = session('username');
        $id = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['reward'] = TodayReward::where('userId', $id)->get()->toArray();

        $request->validate([
            'oldpassword' => 'required',
            'newfpassword' => 'required|min:6',
            'newcpassword' => 'required|min:6|same:newfpassword',
        ]);

        $oldPassword = md5($request->input('oldpassword'));
        $newPassword = md5($request->input('newfpassword'));

        $member = Member::where('username', $userName)
            ->where('password', $oldPassword)
            ->first();

        if ($member) {
            Member::where('username', $userName)->update(['password' => $newPassword]);
            $data['errro'] = ['success' => 'Your Password Updated'];
        } else {
            $data['errror'] = 'Your Old Password Wrong';
        }

        return view('front.security', $data);
    }
}
