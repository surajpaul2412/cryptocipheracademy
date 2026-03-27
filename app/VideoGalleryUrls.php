<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoGalleryUrls extends Model
{
	protected $fillable = [
        'video_gallery_id','url'
    ];

    public function videoGallery()
    {
        return $this->belongsTo('App\VideoGallery');
    }
}
