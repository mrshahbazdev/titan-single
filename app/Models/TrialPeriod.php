<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrialPeriod extends Model
{
    protected $table = 'trial_periods';
    public $timestamps = false;

    protected $fillable = ['tasks', 'days'];
}
