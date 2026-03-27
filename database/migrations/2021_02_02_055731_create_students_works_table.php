<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_works', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('name');
            $table->string('speciality');
            $table->string('image');
            $table->longText('short_desc')->nullable();
            $table->longText('student_profile')->nullable();
            $table->longText('education')->nullable();
            $table->longText('interest')->nullable();
            $table->longText('work_prof')->nullable();
            $table->longText('testimonial')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('students_works');
    }
}
