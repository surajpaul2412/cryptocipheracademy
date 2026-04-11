<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademyCourse extends Model
{
    protected $fillable = [
        'image',
        'heading',
        'content',
        'url',
        'banner_image',
        'slider_heading',
        'slider_duration',
    ];
}
