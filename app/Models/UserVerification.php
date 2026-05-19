<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    protected $table = 'user_verifications';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'phone_number', 'otp_code', 'otp_sent_count',
        'otp_attempts', 'is_verified', 'last_otp_sent', 'created_at', 'updated_at'
    ];
}
