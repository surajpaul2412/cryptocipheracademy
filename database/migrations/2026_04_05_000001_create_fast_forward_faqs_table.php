<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFastForwardFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('fast_forward_faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading');
            $table->longText('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fast_forward_faqs');
    }
}
