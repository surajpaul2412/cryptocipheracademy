<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqHostel extends Model
{
    protected $fillable = [
        'heading', 'content'
    ];
}
