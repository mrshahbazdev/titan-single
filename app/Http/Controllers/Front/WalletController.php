<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;
use App\Models\UserBankInfo;

class WalletController extends Controller
{
    public function index()
    {
        $userName = session('username');
        $userid = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['bank'] = UserBankInfo::where('userId', $userid)->first();
        $data['rewards'] = TodayReward::where('userId', $userid)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        return view('front.wallet', $data);
    }

    public function walletUpdate(Request $request)
    {
        $userid = session('id');
        $userName = session('username');
        $datad['reward'] = TodayReward::where('userId', $userid)->get()->toArray();
        $datad['user'] = Member::where('username', $userName)->first();
        $datad['query'] = SystemSetting::first();

        $request->validate([
            'fullname' => 'required',
            'wallet' => 'required',
            'number' => 'required',
            'network' => 'required',
        ]);

        $bankData = [
            'userId' => $userid,
            'name' => $request->input('fullname'),
            'cardNumber' => $request->input('wallet'),
            'bankName' => $request->input('network'),
            'phoneNumber' => $request->input('number'),
        ];

        $existing = UserBankInfo::where('userId', $userid)->first();
        if ($existing) {
            UserBankInfo::where('userId', $userid)->update([
                'name' => $bankData['name'],
                'cardNumber' => $bankData['cardNumber'],
                'bankName' => $bankData['bankName'],
                'phoneNumber' => $bankData['phoneNumber'],
            ]);
            $datad['errro'] = ['success' => 'Your Bank Info Updated'];
        } else {
            UserBankInfo::create($bankData);
            $datad['errro'] = ['success' => 'Your Bank Data Inserted'];
        }

        $datad['bank'] = UserBankInfo::where('userId', $userid)->first();
        $datad['rewards'] = TodayReward::where('userId', $userid)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        return view('front.wallet', $datad);
    }
}
