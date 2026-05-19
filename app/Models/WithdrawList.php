<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawList extends Model
{
    protected $table = 'withdrawlists';
    public $timestamps = false;

    protected $fillable = [
        'userId', 'username', 'orderAmount', 'mobile', 'bankCard',
        'bankName', 'name', 'created_at', 'oprate'
    ];
}
