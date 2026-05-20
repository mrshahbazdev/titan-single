<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $table = 'members';

    protected $fillable = [
        'qrImage', 'username', 'email', 'password', 'plain_password', 'phN', 'balance',
        'avalibleDailyOrders', 'takeTodayOrders', 'todaycommission',
        'credibility', 'inviteCode', 'myCode', 'status', 'memberLevel',
        'frozenAmout', 'grabOrder', 'registrationTime', 'lastLongInTime',
        'orderStatus', 'withdrawalStatus', 'paymentPassword', 'memberAgent', 'taskStatus'
    ];

    public $timestamps = false;

    public function bankInfo()
    {
        return $this->hasOne(UserBankInfo::class, 'userId', 'id');
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class, 'referrer_id', 'id');
    }

    public function todayRewards()
    {
        return $this->hasMany(TodayReward::class, 'userId', 'id');
    }

    public function productOrders()
    {
        return $this->hasMany(ProductOrder::class, 'userId', 'id');
    }

    public function verification()
    {
        return $this->hasOne(UserVerification::class, 'user_id', 'id');
    }

    public function trials()
    {
        return $this->hasMany(UserTrial::class, 'user_id', 'id');
    }
}
