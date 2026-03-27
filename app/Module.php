<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Module extends Model
{
    protected $fillable = [
        'name'
    ];

    public function videos()
    {
    	return $this->hasMany('App\Video');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
