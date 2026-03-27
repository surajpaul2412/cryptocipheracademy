<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeNotification extends Model
{
    protected $fillable = [
        'batch', 'seat', 'date','notify_text','register_date1','register_date2','register_date3'
    ];
}
