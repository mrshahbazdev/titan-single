<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    protected $table = 'customerservicelist';
    public $timestamps = false;

    protected $fillable = [
        'username', 'password', 'mobileNumber', 'qq', 'weChat',
        'link', 'status', 'workTime', 'addTime'
    ];
}
