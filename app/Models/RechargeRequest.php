<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rechargerequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'amount', 'tid', 'method', 'status', 'created_at', 'updated_at',
    ];
}
