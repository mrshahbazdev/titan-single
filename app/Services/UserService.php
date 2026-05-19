<?php 
// app/Services/UserService.php

namespace App\Services;



use App\Models\Member;
use App\Helpers\UsernameHelper;

class UserService
{
    public static function generateUniqueUsername()
    {
        do {
            $username = UsernameHelper::generateUsername();
        } while (Member::where('username', $username)->exists());
        
        
        return $username;
    }
}
