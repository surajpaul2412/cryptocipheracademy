<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    protected $fillable = [
        'name', 'brief', 'description', 'workings', 'image'
    ];
}
