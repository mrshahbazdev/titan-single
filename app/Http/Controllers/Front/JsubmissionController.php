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
use App\Models\UserTrial;
use App\Models\TrialPeriod;
use Illuminate\Support\Facades\DB;

class JsubmissionController extends Controller
{
    public function index()
    {
        $userName = session('username');
        $id = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $mylevel = MemberLevel::where('level', $data['user']->memberLevel)->first();
        $data['rewardd'] = TodayReward::where('userId', $id)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        $data['totals'] = TodayReward::where('userId', $id)->count();

        $today = date('Y-m-d');
        $totalTasksToday = TodayReward::where('userId', $id)
            ->where('created_at', $today)
            ->count();
        $dailyLimit = $mylevel->orderReciveLimit ?? 0;

        $checkTrial = UserTrial::where('user_id', $id)
            ->where('payment_status', 'pending')
            ->first();

        if ($checkTrial) {
            $currentDate = date('Y-m-d');
            if ($currentDate > $checkTrial->trial_end_date) {
                if ($checkTrial->payment_status == 'pending') {
                    $data['totals'] = TodayReward::where('userId', $id)->count();
                    $data['reward'] = TodayReward::where('userId', $id)->get()->toArray();
                    $data['errortoday'] = 'Your trial period has expired. Please purchase a product to unlock your tasks. Thank you!';
                    return view('front.journey', $data);
                }
            } else {
                $trialDailyTasks = TrialPeriod::first();
                if ($totalTasksToday >= ($trialDailyTasks->tasks ?? 0)) {
                    $data['totals'] = TodayReward::where('userId', $id)->count();
                    $data['reward'] = TodayReward::where('userId', $id)->get()->toArray();
                    $data['errortoday'] = 'Your Daily tasks limit has been reached. Please come back tomorrow.';
                    return view('front.journey', $data);
                } else {
                    return $this->processTask($data, $id, $userName);
                }
            }
        } else {
            if ($totalTasksToday >= $dailyLimit) {
                $data['totals'] = TodayReward::where('userId', $id)->count();
                $data['reward'] = TodayReward::where('userId', $id)->get()->toArray();
                $data['errortoday'] = 'Your Daily tasks limit has been reached. Please come back tomorrow.';
                return view('front.journey', $data);
            } else {
                return $this->processTask($data, $id, $userName);
            }
        }

        return view('front.journey', $data);
    }

    private function processTask($data, $id, $userName)
    {
        $data['reward'] = TodayReward::where('userId', $id)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        $pendingProduct = ProductOrder::where('userId', $id)->where('status', 0)->first();

        if ($data['user']->orderStatus === '0') {
            return redirect('/journey');
        }

        if ($pendingProduct) {
            $data['rewards'] = Product::where('id', $pendingProduct->productId)->first();
            $data['pendingProduts'] = $pendingProduct;
            $data['totalRewards'] = TodayReward::where('userId', $id)->get()->toArray();
            return view('front.jsubmission', $data);
        }

        $balance = $data['user']->balance;
        $recentProductIds = ProductOrder::where('userId', $id)
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->pluck('productId')
            ->toArray();

        $product = Product::where('productPrice', '<', $balance)
            ->when(!empty($recentProductIds), function ($query) use ($recentProductIds) {
                $query->whereNotIn('id', $recentProductIds);
            })
            ->inRandomOrder()
            ->first();

        if (!$product) {
            $product = Product::where('productPrice', '<', $balance)
                ->inRandomOrder()
                ->first();
        }

        if ($product) {
            $memberLevelData = MemberLevel::where('level', $data['user']->memberLevel)->first();
            $commissionRate = $memberLevelData->commissionRate ?? 0;
            $price = $product->productPrice;
            $productId = $product->id;
            $userBalance = $data['user']->balance;
            $commsion = $commissionRate;
            $parentCommssions = $commissionRate;

            ProductOrder::create([
                'userId' => $id,
                'productId' => $productId,
                'price' => $price,
                'comission' => $commsion,
                'status' => 0,
                'time' => time(),
            ]);

            $newBalance = $userBalance - $price;
            $this->memberBalanceUpdate($id, $newBalance, $parentCommssions);

            $pendingProducts = ProductOrder::where('userId', $id)->where('status', 0)->first();
            $data['pendingProduts'] = $pendingProducts;
            $data['rewards'] = $product;
            $data['totalRewards'] = TodayReward::where('userId', $id)->get()->toArray();
            return view('front.jsubmission', $data);
        } else {
            $data['error'] = 'Please Wait No More Ticket';
            return view('front.journey', $data);
        }
    }

    private function memberBalanceUpdate($id, $newBalance, $parentCommssions)
    {
        $parentUser = Member::find($id);
        $parentRefCode = $parentUser->inviteCode;
        $parentUserGet = Member::where('myCode', $parentRefCode)->first();

        if ($parentUserGet) {
            $parentUserNewBalance = $parentUserGet->balance + $parentCommssions;
            // Parent balance update commented out in original code
        }

        Member::where('id', $id)->update(['balance' => $newBalance]);
    }
}
