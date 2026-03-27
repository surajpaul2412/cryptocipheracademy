<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('course');
            $table->string('batch');
            $table->string('image');
            $table->string('address');
            $table->string('nationality');
            $table->string('pincode');
            $table->string('fathers_name')->nullable();
            $table->string('fathers_phone')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('gst')->comment('1 = Applicable, 0 = Not Applicable');
            $table->string('trade_title')->nullable();
            $table->string('trade_address')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('10_school')->nullable();
            $table->string('10_year')->nullable();
            $table->string('10_board')->nullable();
            $table->string('12_school')->nullable();
            $table->string('12_year')->nullable();
            $table->string('12_board')->nullable();
            $table->string('ug_school')->nullable();
            $table->string('ug_year')->nullable();
            $table->string('ug_board')->nullable();
            $table->string('g_school')->nullable();
            $table->string('g_year')->nullable();
            $table->string('g_board')->nullable();
            $table->string('pg_school')->nullable();
            $table->string('pg_year')->nullable();
            $table->string('pg_board')->nullable();
            $table->string('stream');
            $table->string('music_bg_info')->nullable();
            $table->string('plans')->nullable();
            $table->string('health_problem')->nullable();
            $table->string('parent_sign');
            $table->string('student_sign');
            $table->string('status')->nullable();
            $table->string('fees_status')->nullable();
            $table->string('fees_mode_of_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_details');
    }
}
