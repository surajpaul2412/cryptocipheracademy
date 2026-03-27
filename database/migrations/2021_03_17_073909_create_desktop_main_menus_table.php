<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesktopMainMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desktop_main_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('desktop_menu_section_id');
            $table->string('name');
            $table->longText('url');
            $table->string('slug');
            $table->decimal('sort_by')->nullable();
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
        Schema::dropIfExists('desktop_main_menus');
    }
}
