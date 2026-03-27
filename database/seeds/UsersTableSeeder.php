<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfUsers = \DB::table('users')->count();

    	if($numberOfUsers == 0)
    	{
    		DB::table('users')->insert([
    			'role_id' => '1',
	        	'name' => 'Admin',
	        	'email' => 'admin@crypto.in',
	        	'phone' => '1234567890',
	        	'password' => bcrypt('test1234'),
	        ]);
	        DB::table('users')->insert([
    			'role_id' => '2',
	        	'name' => 'Manager',
	        	'email' => 'manager@crypto.in',
	        	'phone' => '1234567891',
	        	'password' => bcrypt('test1234'),
	        ]);
	        DB::table('users')->insert([
    			'role_id' => '3',
	        	'name' => 'Faculty',
	        	'email' => 'faculty@crypto.in',
	        	'phone' => '1234567892',
	        	'password' => bcrypt('test1234'),
	        ]);
	        DB::table('users')->insert([
    			'role_id' => '4',
	        	'name' => 'Student',
	        	'email' => 'student@crypto.in',
	        	'phone' => '1234567893',
	        	'password' => bcrypt('test1234'),
	        ]);
    	}
    }
}
