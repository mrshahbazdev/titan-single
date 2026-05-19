<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextManagement extends Model
{
    protected $table = 'textmanagements';
    public $timestamps = false;

    protected $fillable = ['pageName', 'title', 'content'];
}
