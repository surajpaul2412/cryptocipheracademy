<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfMenus = \DB::table('menus')->count();

    	if($numberOfMenus == 0)
    	{
    		DB::table('menus')->insert([
	        	'name' => 'About Us',
	        	'slug' => 'about_us',
	        ]);
	        DB::table('menus')->insert([
	        	'name' => 'Music Production Course Modules',
	        	'slug' => 'music_production_course_modules',
	        ]);
	        DB::table('menus')->insert([
	        	'name' => 'Sound Engineering Diploma Modules',
	        	'slug' => 'sound_engineering_diploma_modules',
	        ]);
	        DB::table('menus')->insert([
	        	'name' => 'Audio Faculty Departments',
	        	'slug' => 'audio_faculty_departments',
	        ]);
	        DB::table('menus')->insert([
	        	'name' => 'Exam Structure & Certification',
	        	'slug' => 'exam_structure_certification',
	        ]);
	        DB::table('menus')->insert([
	        	'name' => 'Frequently Asked Questions',
	        	'slug' => 'frequently_asked_questions',
	        ]);
	        DB::table('menus')->insert([
	        	'name' => 'Admission Procedure',
	        	'slug' => 'admission_procedure',
	        ]);
	        DB::table('menus')->insert([
	        	'name' => 'Jobs',
	        	'slug' => 'jobs',
	        ]);
	        DB::table('menus')->insert([
	        	'name' => 'Resources',
	        	'slug' => 'resources',
	        ]);
    	}
    }
}
