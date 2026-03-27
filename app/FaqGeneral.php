<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqGeneral extends Model
{
    protected $fillable = [
        'heading', 'content'
    ];
}
