<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodayReward extends Model
{
    protected $table = 'todayrewards';
    public $timestamps = false;

    protected $fillable = ['userId', 'reward', 'tasks', 'created_at'];
}
