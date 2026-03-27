<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$numberOfRoles = \DB::table('roles')->count();

    	if($numberOfRoles == 0)
    	{
    		DB::table('roles')->insert([
	        	'name' => 'Admin',
	        	'slug' => 'admin',
	        ]);
	        DB::table('roles')->insert([
	        	'name' => 'Manager',
	        	'slug' => 'manager',
	        ]);
	        DB::table('roles')->insert([
	        	'name' => 'Faculty',
	        	'slug' => 'faculty',
	        ]);
	        DB::table('roles')->insert([
	        	'name' => 'Student',
	        	'slug' => 'student',
	        ]);
    	}
    }
}
