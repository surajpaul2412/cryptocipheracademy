<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamProduction extends Model
{
    protected $fillable = [
        'heading', 'content', 'image'
    ];
}
