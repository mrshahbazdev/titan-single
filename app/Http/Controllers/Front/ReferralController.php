<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\DB;

class ReferralController extends Controller
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

        $sql = "
            WITH RECURSIVE referral_chain AS (
                SELECT r.referrer_id, r.referred_id, 1 AS level
                FROM referrals r
                WHERE r.referrer_id = ?
                UNION ALL
                SELECT r.referrer_id, r.referred_id, rc.level + 1
                FROM referrals r
                INNER JOIN referral_chain rc ON r.referrer_id = rc.referred_id
            )
            SELECT rc.level, r.referrer_id, r.referred_id, u.username, u.myCode, u.memberLevel, u.balance
            FROM referral_chain rc
            JOIN members u ON rc.referred_id = u.id
            JOIN referrals r ON r.referred_id = u.id
        ";

        $referralData = DB::select($sql, [$id]);
        $tree = $this->buildTree($referralData, $id);
        $data['referralTree'] = $tree;
        $data['referralChain'] = $referralData;

        return view('front.referral', $data);
    }

    private function buildTree($elements, $parentId = null)
    {
        $branch = [];
        foreach ($elements as $element) {
            if ($element->referrer_id == $parentId) {
                $children = $this->buildTree($elements, $element->referred_id);
                if ($children) {
                    $element->children = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
}
