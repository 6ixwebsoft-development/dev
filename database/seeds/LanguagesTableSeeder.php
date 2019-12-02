<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_languages')->delete();
		$languages = array(
			array('id' => 1, 'language' => 'English Us', 'locale' => "en_US", 'status' => 1),
			array('id' => 2, 'language' => 'English Uk', 'locale' => "en_GB", 'status' => 1),
			array('id' => 3, 'language' => 'German', 'locale' => "de_DE", 'status' => 1),
			array('id' => 4, 'language' => 'Swedish', 'locale' => "sv_SE", 'status' => 1)
		);
		DB::table('gg_languages')->insert($languages);
	}
}