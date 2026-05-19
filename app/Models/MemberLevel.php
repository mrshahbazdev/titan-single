<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberLevel extends Model
{
    protected $table = 'memberlevels';
    public $timestamps = false;

    protected $fillable = ['level', 'levelName', 'orderReciveLimit', 'ordersGrabbed', 'commissionRate', 'price', 'minimumBalanceLimit'];
}
