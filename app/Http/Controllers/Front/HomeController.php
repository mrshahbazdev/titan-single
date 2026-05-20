<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;
use App\Models\HomeRotator;
use App\Models\Announcement;

class HomeController extends Controller
{
    public function index()
    {
        if (session('username')) {
            return redirect('/journey');
        }
        $settings = SystemSetting::first();
        return view('front.homeMain', ['query' => $settings]);
    }

    public function home()
    {
        return redirect('/journey');
    }
}
