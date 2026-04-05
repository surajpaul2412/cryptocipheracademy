<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class MakeBatchNullableOnStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE student_details MODIFY batch VARCHAR(255) NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('student_details')->whereNull('batch')->update(['batch' => '']);
        DB::statement("ALTER TABLE student_details MODIFY batch VARCHAR(255) NOT NULL");
    }
}
