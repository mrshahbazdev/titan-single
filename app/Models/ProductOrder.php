<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'productorder';
    public $timestamps = false;

    protected $fillable = ['userId', 'productId', 'price', 'comission', 'status', 'time'];
}
