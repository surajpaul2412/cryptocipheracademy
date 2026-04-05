<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterFormCourse extends Model
{
    protected $fillable = [
        'name',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
