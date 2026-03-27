<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfSubmenus = \DB::table('submenus')->count();

    	if($numberOfSubmenus == 0)
    	{
    		DB::table('submenus')->insert([
	        	'menu_id' => '1',
	        	'name' => 'Mission & Vision Statements',
	        	'slug' => 'mission_vision_statements',
	        ]);
            DB::table('submenus')->insert([
                'menu_id' => '1',
                'name' => 'Success Stories',
                'slug' => 'success_stories',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '1',
                'name' => 'Student Work',
                'slug' => 'student_work',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '1',
                'name' => 'Studio Equipment & Gallery',
                'slug' => 'studio_equipment_gallery',
            ]);

            DB::table('submenus')->insert([
                'menu_id' => '2',
                'name' => 'Logic Pro X',
                'slug' => 'logic_pro_x',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '2',
                'name' => 'Ableton Live',
                'slug' => 'ableton_live',
            ]);

            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Logic Pro X',
                'slug' => 'logic_pro_x',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Ableton Live',
                'slug' => 'ableton_live',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Studio Recordings',
                'slug' => 'studio_recordings',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Music Theory & Arrangements',
                'slug' => 'music_theory_arrangements',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Audio System Design Foundation',
                'slug' => 'audio_system_design_foundation',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Studio Interconnection',
                'slug' => 'studio_interconnection',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Synthesis & Sound Design',
                'slug' => 'synthesis_sound_design',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Mixing & Mastering',
                'slug' => 'mixing_mastering',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Live Analogue & Digital Mixers',
                'slug' => 'live_analogue_digital_mixers',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '3',
                'name' => 'Studio Acoustics & Sound Proofing',
                'slug' => 'studio_acoustics_sound_proofing',
            ]);

            DB::table('submenus')->insert([
                'menu_id' => '6',
                'name' => 'Course Related Queries',
                'slug' => 'course_related_queries',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '6',
                'name' => 'General Questions',
                'slug' => 'general_questions',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '6',
                'name' => 'Hostel',
                'slug' => 'hostel',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '6',
                'name' => 'Career',
                'slug' => 'career',
            ]);

            DB::table('submenus')->insert([
                'menu_id' => '9',
                'name' => 'Downloads',
                'slug' => 'downloads',
            ]);
            DB::table('submenus')->insert([
                'menu_id' => '9',
                'name' => 'News & Articles',
                'slug' => 'news_articles',
            ]);
    	}
    }
}
