<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;
use App\Models\UserBankInfo;
use App\Models\WithdrawList;

class WithdrawalController extends Controller
{
    public function index()
    {
        $userName = session('username');
        $userid = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();

        if ($data['user']->withdrawalStatus !== '0') {
            $data['bank'] = UserBankInfo::where('userId', $userid)->first();
            $data['balance'] = Member::find($userid);
            $data['rewards'] = TodayReward::where('userId', $userid)
                ->where('created_at', date('Y-m-d'))
                ->get()->toArray();
            return view('front.withdraw', $data);
        }

        return redirect('/journey');
    }

    public function withdrawalhistory()
    {
        $userName = session('username');
        $userid = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['users'] = WithdrawList::where('userId', $userid)->orderBy('id', 'DESC')->get()->toArray();
        $data['rewards'] = TodayReward::where('userId', $userid)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        return view('front.rechargeHistory', $data);
    }

    public function request(Request $request)
    {
        $userid = session('id');
        $userName = session('username');
        $data['user'] = Member::where('username', $userName)->first();
        $data['query'] = SystemSetting::first();
        $data['bank'] = UserBankInfo::where('userId', $userid)->first();
        $data['balance'] = Member::find($userid);
        $data['reward'] = TodayReward::where('userId', $userid)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();

        $bankQuery = UserBankInfo::where('userId', $userid)->first();
        if (!$bankQuery) {
            $data['error'] = ['success' => 'Please Fill Bank Detail First'];
            return view('front.withdraw', $data);
        }

        $orderd = $request->input('orderd');
        if (!$orderd) {
            return redirect('/withdrawal');
        }

        $bal = Member::where('username', $userName)->first();
        $mybalance = $bal->balance;

        if ($orderd > $mybalance) {
            $data['error'] = 'your balance too low';
            return view('front.withdraw', $data);
        }

        $newBalance = $mybalance - $orderd;
        Member::where('id', $userid)->update(['balance' => $newBalance]);

        $bankDetail = UserBankInfo::where('userId', $userid)->first();
        WithdrawList::create([
            'userId' => $userid,
            'username' => $userName,
            'orderAmount' => $orderd,
            'mobile' => $bankDetail->phoneNumber ?? '',
            'bankCard' => $bankDetail->cardNumber ?? '',
            'bankName' => $bankDetail->bankName ?? '',
            'name' => $bankDetail->name ?? '',
            'created_at' => time(),
            'oprate' => 0,
        ]);

        $data['success'] = ['success' => 'Your Order Submited'];
        return view('front.withdraw', $data);
    }
}
