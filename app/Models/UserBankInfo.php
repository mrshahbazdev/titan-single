<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBankInfo extends Model
{
    protected $table = 'userbankinfos';
    public $timestamps = false;

    protected $fillable = ['userId', 'name', 'cardNumber', 'bankName', 'phoneNumber'];
}
