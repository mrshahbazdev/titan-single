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
        $userName = session('username');
        $id = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['rewards'] = TodayReward::where('userId', $id)
            ->where('created_at', date('Y-m-d'))
            ->get()
            ->toArray();
        $data['rotators'] = HomeRotator::orderBy('id', 'DESC')->get();
        $data['announcements'] = Announcement::orderBy('id', 'DESC')->limit(1)->get();
        return view('front.home', $data);
    }
}
