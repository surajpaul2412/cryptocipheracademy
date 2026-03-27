<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadForm extends Model
{
    protected $fillable = [
        'name','email','phone','download_id'
    ];
}
