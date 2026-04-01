<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailFieldsToFastForwardCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fast_forward_courses', function (Blueprint $table) {
            $table->string('event_badge_text')->nullable()->after('badge_text');
            $table->string('slug')->nullable()->unique()->after('website');
            $table->longText('detail_content')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fast_forward_courses', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn(['event_badge_text', 'slug', 'detail_content']);
        });
    }
}
