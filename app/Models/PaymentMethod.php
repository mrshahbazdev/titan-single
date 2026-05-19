<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';
    public $timestamps = false;

    protected $fillable = ['name', 'account_number', 'account_name', 'status'];
}
