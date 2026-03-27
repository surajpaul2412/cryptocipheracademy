<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesktopMainMenu extends Model
{
    public function desktopSubMenu()
    {
        return $this->hasMany('App\DesktopSubMenu')->orderBy('sort_by', 'asc');
    }

    public function desktopMenuSections()
    {
    	return $this->belongsTo('App\DesktopMenuSection')->orderBy('sort_by', 'asc');
    }
}
