<?php

namespace App\Models;

use Tabler\App\Models\User as Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
