<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\SystemSetting;
use App\Models\TodayReward;
use App\Models\TextManagement;

class TextPageController extends Controller
{
    public function about()
    {
        return $this->showPage('about');
    }

    public function faqs()
    {
        return $this->showPage('faqs');
    }

    public function term()
    {
        return $this->showPage('term');
    }

    public function gettouch()
    {
        $userName = session('username');
        $id = session('id');
        $data['query'] = SystemSetting::first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['rewards'] = TodayReward::where('userId', $id)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        return view('front.gettouch', $data);
    }

    private function showPage($uri)
    {
        $userName = session('username');
        $id = session('id');
        $data['query'] = SystemSetting::first();
        $data['faq'] = TextManagement::where('pageName', $uri)->first();
        $data['user'] = Member::where('username', $userName)->first();
        $data['rewards'] = TodayReward::where('userId', $id)
            ->where('created_at', date('Y-m-d'))
            ->get()->toArray();
        return view('front.faq', $data);
    }
}
