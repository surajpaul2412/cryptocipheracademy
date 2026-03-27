<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentsWork extends Model
{
    protected $fillable = [
        'year','name','speciality','image','short_desc','student_profile','education','interest','work_prof','testimonial','status','slug','meta_title','meta_keyword','meta_description','sort_by'
    ];
}
