<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function menu()
    {
    	return $this->belongsTo('App\Menu');
    }
}
