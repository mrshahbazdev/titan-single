<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RechargeList extends Model
{
    protected $table = 'rechargelist';
    public $timestamps = false;

    protected $fillable = ['userId', 'username', 'orderAmout', 'created_at'];
}
