<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title', 'description', 'video_url', 'module_id'
    ];

    public function module()
    {
        return $this->belongsTo('App\Module');
    }
}
