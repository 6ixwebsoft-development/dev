<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_modules')->delete();
		$modules = array(
			array('id' => 1,'name' => 'Organization' ,'status' => "1")
		);
		DB::table('gg_modules')->insert($modules);
	}
}