<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesktopSubMenu extends Model
{
    public function desktopMainMenus()
    {
    	return $this->belongsTo('App\DesktopMainMenu')->orderBy('sort_by', 'asc');
    }
}
