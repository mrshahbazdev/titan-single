<?php 
// app/Helpers/UsernameHelper.php

namespace App\Helpers;

class UsernameHelper
{
    public static function generateUsername($length = 6)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $username = '';
        
        for ($i = 0; $i < $length; $i++) {
            $username .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        return strtoupper($username);
    }
}
