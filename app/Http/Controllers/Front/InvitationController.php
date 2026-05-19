<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;

class InvitationController extends Controller
{
    public function index()
    {
        $userName = session('username');
        $id = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['rewards'] = TodayReward::where('userId', $id)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        return view('front.invitation', $data);
    }
}
