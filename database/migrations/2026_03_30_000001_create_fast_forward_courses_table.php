<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFastForwardCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fast_forward_courses', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('subheading')->nullable();
            $table->string('badge_text');
            $table->text('description');
            $table->string('highlight_text')->nullable();
            $table->string('time_text');
            $table->string('seats_text');
            $table->string('admission_text');
            $table->string('fees_text');
            $table->string('contact_phone');
            $table->string('website');
            $table->string('image');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('fast_forward_courses');
    }
}
