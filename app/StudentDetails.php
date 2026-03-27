<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentDetails extends Model
{
    protected $fillable = [
        'student_id','course','batch','image','address','nationality','pincode','fathers_name','fathers_phone','guardian_name','guardian_phone','guardian_occupation','gst','trade_title','trade_address','gst_number','10_school','10_year','10_board','12_school','12_year','12_board','ug_school','ug_year','ug_board','g_school','g_year','g_board','pg_school','pg_year','pg_board','stream','music_bg_info','plans','health_problem','parent_sign','student_sign','status','fees_status','fees_mode_of_payment','result','result_review','invoice','id_type','id_no','signature3'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
