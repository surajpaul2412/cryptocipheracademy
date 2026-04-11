<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHomeSliderFieldsToAcademyCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academy_courses', function (Blueprint $table) {
            $table->string('banner_image')->nullable()->after('image');
            $table->string('slider_heading')->nullable()->after('url');
            $table->string('slider_duration')->nullable()->after('slider_heading');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('academy_courses', function (Blueprint $table) {
            $table->dropColumn([
                'banner_image',
                'slider_heading',
                'slider_duration',
            ]);
        });
    }
}
