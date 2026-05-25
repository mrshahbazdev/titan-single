<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;
use Illuminate\Support\Facades\DB;

class JourneyController extends Controller
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
        return view('front.journey', $data);
    }

    public function claimLevel(Request $request)
    {
        $userName = session('username');
        $id = session('id');
        $user = Member::where('username', $userName)->first();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'User not found']);
        }

        $level = $request->input('level');
        $levelData = DB::table('memberlevels')->where('level', $level)->first();

        if (!$levelData) {
            return response()->json(['status' => 'error', 'message' => 'Level not found']);
        }

        if ($level <= $user->memberLevel) {
            return response()->json(['status' => 'error', 'message' => 'Level already claimed']);
        }

        $totalReferrals = DB::table('referrals')->where('referrer_id', $user->id)->count();
        $effectiveReferrals = $totalReferrals - $user->claimedReferrals;

        if ($effectiveReferrals < $levelData->ordersGrabbed) {
            return response()->json(['status' => 'error', 'message' => 'Not enough referrals to claim this level']);
        }

        if ($user->balance < $levelData->price) {
            return response()->json(['status' => 'error', 'message' => 'Insufficient balance to claim this level']);
        }

        Member::where('id', $user->id)->update([
            'memberLevel' => $level,
            'claimedReferrals' => $totalReferrals,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Level ' . $level . ' claimed successfully!']);
    }
}
