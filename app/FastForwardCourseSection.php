<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FastForwardCourseSection extends Model
{
    protected $fillable = [
        'fast_forward_course_id',
        'heading',
        'subheading',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(FastForwardCourse::class, 'fast_forward_course_id');
    }

    public function points()
    {
        return $this->hasMany(FastForwardCourseSectionPoint::class, 'fast_forward_course_section_id');
    }
}
