<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addrole extends Model
{
    use HasFactory;
    protected $fillable = [
    	'roleName',
    	'frontPage',
    	'systemManagement',
    	'shoppingMallManagement',
    	'memberManagement',
    	'transactionManagement',
    ];
}
