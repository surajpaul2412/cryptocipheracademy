<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'short_image1', 'short_image2', 'short_image3','short_image4'
    ];
}
