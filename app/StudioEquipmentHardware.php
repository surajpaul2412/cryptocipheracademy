<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudioEquipmentHardware extends Model
{
    protected $fillable = [
        'label', 'option1', 'option2', 'option3', 'option4', 'option5'
    ];
}
