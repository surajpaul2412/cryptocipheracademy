<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FastForwardCourse extends Model
{
    protected $fillable = [
        'heading',
        'subheading',
        'badge_text',
        'description',
        'highlight_text',
        'time_text',
        'seats_text',
        'admission_text',
        'fees_text',
        'contact_phone',
        'website',
        'detail_url',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
