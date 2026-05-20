<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $table = 'signups';


    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'password',
        'confirm_password',
    ];
}
