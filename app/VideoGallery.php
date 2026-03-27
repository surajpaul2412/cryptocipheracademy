<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
	protected $fillable = [
        'name'
    ];

    public function videoGalleryUrls()
    {
    	return $this->hasMany('App\VideoGalleryUrls');
    }
}
