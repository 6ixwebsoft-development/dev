<?php

use Illuminate\Database\Seeder;

class LabelTranslationsTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_label_translations')->delete();
		$LabelTranslations = array(
			array('id' => 1, 'keyword_id' => '1', 'language_id' => 1, 'translation' => 'color'),
			array('id' => 2, 'keyword_id' => '1', 'language_id' => 2, 'translation' => 'colour'),
			array('id' => 3, 'keyword_id' => '1', 'language_id' => 3, 'translation' => 'Farbe'),
			array('id' => 4, 'keyword_id' => '1', 'language_id' => 4, 'translation' => 'Färg')
		);
		DB::table('gg_label_translations')->insert($LabelTranslations);
	}
}