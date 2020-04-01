<?php

use Illuminate\Database\Seeder;

class TranslationsTableSeeder extends Seeder
{
	
	
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_translations')->delete();
		$translations = array(
			array('id' => 1, 'group' => 'Foundation')
			
		);
		DB::table('gg_translations')->insert($translations);
	}
}