<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqCareer extends Model
{
    protected $fillable = [
        'heading', 'content'
    ];
}
