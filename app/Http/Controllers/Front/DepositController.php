<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;
use App\Models\PaymentMethod;
use App\Models\RechargeRequest;

class DepositController extends Controller
{
    public function index(Request $request)
    {
        $userName = session('username');
        $id = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['rewards'] = TodayReward::where('userId', $id)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        $data['bankData'] = PaymentMethod::all();

        if ($request->isMethod('post')) {
            $request->validate([
                'amount' => 'required|numeric',
                'tid' => 'required',
                'paymentmethod' => 'required',
            ]);

            RechargeRequest::create([
                'user_id' => $id,
                'amount' => $request->input('amount'),
                'tid' => $request->input('tid'),
                'method' => $request->input('paymentmethod'),
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect('/deposit/deposithistory')
                ->with('success', 'Deposit request has been submitted successfully.');
        }

        return view('front.deposit', $data);
    }

    public function deposithistory()
    {
        $userName = session('username');
        $userid = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['users'] = RechargeRequest::where('user_id', $userid)->orderBy('id', 'desc')->get();
        $data['rewards'] = TodayReward::where('userId', $userid)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        return view('front.withdrawHistory', $data);
    }
}
