<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFloatingMessageToHomeNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_notifications', function (Blueprint $table) {
            $table->longText('floating_message')->nullable()->after('notify_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_notifications', function (Blueprint $table) {
            $table->dropColumn('floating_message');
        });
    }
}
