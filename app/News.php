<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'content','title','slug','image','meta_title','meta_description','meta_script'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($news) {
            $news->update(['slug' => $news->slug]);
        });
    }

    public function newstags()
    {
        return $this->hasMany('App\NewsTag');
    }
}
