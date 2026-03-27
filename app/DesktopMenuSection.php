<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesktopMenuSection extends Model
{
    public function desktopMainMenu()
    {
        return $this->hasMany('App\DesktopMainMenu')->orderBy('sort_by', 'asc');
    }
}
