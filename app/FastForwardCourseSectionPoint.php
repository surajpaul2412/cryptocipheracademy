<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FastForwardCourseSectionPoint extends Model
{
    protected $fillable = [
        'fast_forward_course_section_id',
        'point_text',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function section()
    {
        return $this->belongsTo(FastForwardCourseSection::class, 'fast_forward_course_section_id');
    }
}
