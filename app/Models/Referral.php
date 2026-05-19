<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = 'referrals';
    public $timestamps = false;

    protected $fillable = ['referrer_id', 'referred_id'];
}
