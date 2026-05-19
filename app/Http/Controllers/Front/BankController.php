<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;
use App\Models\PaymentMethod;

class BankController extends Controller
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
        $data['totals'] = TodayReward::where('userId', $id)->count();
        $data['reward'] = TodayReward::where('userId', $id)->get()->toArray();
        $data['bankData'] = PaymentMethod::all();
        return view('front.banks', $data);
    }
}
