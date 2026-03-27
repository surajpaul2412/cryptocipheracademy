<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademyCourse extends Model
{
    protected $fillable = [
        'content', 'heading'
    ];
}
