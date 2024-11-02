<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'bookName',
        'authorName',
        'bookQuantity',
        'bookDescription',
    ];
}
