<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'status',
        'priority',
        'due_date',
        'description',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];
}