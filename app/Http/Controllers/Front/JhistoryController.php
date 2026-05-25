<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;
use App\Models\ProductOrder;
use App\Models\Product;
use App\Models\MemberLevel;

class JhistoryController extends Controller
{
    public function index()
    {
        $userName = session('username');
        $id = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['total'] = ProductOrder::where('userId', $id)->orderBy('id', 'DESC')->get()->toArray();
        $data['rewards'] = TodayReward::where('userId', $id)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        return view('front.jhistory', $data);
    }

    public function productSubmit(Request $request)
    {
        $userName = session('username');
        $userID = session('id');
        $id = $request->query('id');
        $user = Member::where('username', $userName)->first();

        $getProductOrder = ProductOrder::where('id', $id)->where('status', 0)->first();
        if ($getProductOrder) {
            $commission = $getProductOrder->comission;
            $userBalance = $user->balance;
            $newBalance = $commission + $userBalance;

            // Update extra reward
            $total = TodayReward::where('userId', $userID)->count();
            $continuousOrder = \App\Models\ContinuousOrder::where('userId', $userID)
                ->where('continuous', $total)
                ->where('status', '0')
                ->orderBy('id', 'ASC')
                ->first();
            if ($continuousOrder) {
                \App\Models\ContinuousOrder::where('id', $continuousOrder->id)
                    ->where('userId', $userID)
                    ->where('status', 0)
                    ->update(['status' => 1]);
            }

            // Update member balance
            $parentUser = Member::find($userID);
            $parentRefCode = $parentUser->inviteCode;
            $parentUserGet = Member::where('myCode', $parentRefCode)->first();
            Member::where('id', $userID)->update(['balance' => $newBalance]);

            // Update product order status
            ProductOrder::where('id', $id)->update(['status' => 1]);

            // Insert today reward
            TodayReward::create([
                'userId' => $userID,
                'reward' => $commission,
                'tasks' => 1,
                'created_at' => date('Y-m-d'),
            ]);

            return response('success');
        }

        return response('error');
    }
}
