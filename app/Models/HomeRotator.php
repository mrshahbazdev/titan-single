<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeRotator extends Model
{
    protected $table = 'homerotators';
    public $timestamps = false;

    protected $fillable = ['title', 'image', 'addTime'];
}
