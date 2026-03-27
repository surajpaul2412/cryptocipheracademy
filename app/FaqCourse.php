<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqCourse extends Model
{
    protected $fillable = [
        'heading', 'content'
    ];
}
