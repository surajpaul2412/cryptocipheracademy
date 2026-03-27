<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pros extends Model
{
    protected $fillable = [
        'name', 'brief', 'description', 'workings', 'image'
    ];
}
