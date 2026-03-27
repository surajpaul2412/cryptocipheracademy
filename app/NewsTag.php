<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTag extends Model
{
    protected $fillable = [
        'news_id','tag','is_updated'
    ];

    public function news()
    {
        return $this->belongsTo('App\News');
    }
}
