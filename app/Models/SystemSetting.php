<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $table = 'systemsettings';
    public $timestamps = false;

    protected $fillable = [
        'siteTitle', 'siteLogo', 'siteUrl', 'minWithdrawal', 'maxWithdrawal',
        'withdrawalTimes', 'minRecharge', 'maxRecharge', 'rechargeTimes', 'chatbot_code'
    ];
}
