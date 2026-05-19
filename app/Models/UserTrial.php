<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTrial extends Model
{
    protected $table = 'user_trials';
    public $timestamps = false;

    protected $fillable = ['user_id', 'trial_end_date', 'payment_status'];
}
