<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFastForwardCourseSectionPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fast_forward_course_section_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fast_forward_course_section_id');
            $table->text('point_text');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('fast_forward_course_section_id', 'ff_course_section_points_section_fk')
                ->references('id')
                ->on('fast_forward_course_sections')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fast_forward_course_section_points');
    }
}
