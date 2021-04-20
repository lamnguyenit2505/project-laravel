<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		[
    			'name' => 'Mai Chi',
    			'email' => 'maichi@gmail.com',
    			'password' => bcrypt('123456'),
    			'level' => 1
    		],

    		[
    			'name' => 'Lam Nguyen',
    			'email' => 'admin@gmail.com',
    			'password' => bcrypt('2505'),
    			'level' => 2
    		],

    	];

        DB::table('vp_users')->insert($data);
    }
}
