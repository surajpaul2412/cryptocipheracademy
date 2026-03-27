<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\carbon;

class DesktopMenuSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfMenus = \DB::table('desktop_menu_sections')->count();

    	if($numberOfMenus == 0)
    	{
    		DB::table('desktop_menu_sections')->insert([
	        	'section_id' => 1,
	        	'sort_by' => 1.00,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now(),
	        ]);
	        DB::table('desktop_menu_sections')->insert([
	        	'section_id' => 2,
	        	'sort_by' => 2.00,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now(),
	        ]);
	        DB::table('desktop_menu_sections')->insert([
	        	'section_id' => 3,
	        	'sort_by' => 3.00,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now(),
	        ]);
	        DB::table('desktop_menu_sections')->insert([
	        	'section_id' => 4,
	        	'sort_by' => 4.00,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now(),
	        ]);
	        DB::table('desktop_menu_sections')->insert([
	        	'section_id' => 5,
	        	'sort_by' => 5.00,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now(),
	        ]);
	        DB::table('desktop_menu_sections')->insert([
	        	'section_id' => 6,
	        	'sort_by' => 6.00,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now(),
	        ]);
	        DB::table('desktop_menu_sections')->insert([
	        	'section_id' => 7,
	        	'sort_by' => 7.00,
	        	'created_at' => Carbon::now(),
	        	'updated_at' => Carbon::now(),
	        ]);
    	}
    }
}
