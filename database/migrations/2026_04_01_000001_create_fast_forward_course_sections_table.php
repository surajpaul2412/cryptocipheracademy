<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFastForwardCourseSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fast_forward_course_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fast_forward_course_id')
                ->constrained('fast_forward_courses')
                ->onDelete('cascade');
            $table->string('heading');
            $table->string('subheading')->nullable();
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
        Schema::dropIfExists('fast_forward_course_sections');
    }
}
