<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FastForwardFaq extends Model
{
    protected $fillable = [
        'heading',
        'content',
    ];
}
