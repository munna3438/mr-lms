<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    protected $fillable = [
        'bookID',
        'studentID',
        'issueDate',
        'returnDate',
    ];
}
