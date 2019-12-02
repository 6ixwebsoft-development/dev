<?php

use Illuminate\Database\Seeder;

class ModuleFieldsValueTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_module_fields_values')->delete();
		$moduleFieldsValue = array(
			array('id' => 1,'field_id' => 1 ,'language_id' => 1, 'value' => 'Travel', 'status' => 1),
			array('id' => 2,'field_id' => 1 ,'language_id' => 1, 'value' => 'Care', 'status' => 1),
			array('id' => 3,'field_id' => 1 ,'language_id' => 1, 'value' => 'Fost', 'status' => 1),
			array('id' => 4,'field_id' => 1 ,'language_id' => 1, 'value' => 'Welfare', 'status' => 1),
			array('id' => 5,'field_id' => 2 ,'language_id' => 1, 'value' => 'Male', 'status' => 1),
			array('id' => 6,'field_id' => 2 ,'language_id' => 1, 'value' => 'Female', 'status' => 1),
			array('id' => 7,'field_id' => 2 ,'language_id' => 1, 'value' => 'individual Person', 'status' => 1),
			array('id' => 8,'field_id' => 3 ,'language_id' => 1, 'value' => 'History', 'status' => 1),
			array('id' => 9,'field_id' => 3 ,'language_id' => 1, 'value' => 'Geology', 'status' => 1),
			array('id' => 10,'field_id' => 3 ,'language_id' => 1, 'value' => 'Antro', 'status' => 1),
			array('id' => 11,'field_id' => 3 ,'language_id' => 1, 'value' => 'Biology', 'status' => 1)
		);
		DB::table('gg_module_fields_values')->insert($moduleFieldsValue);
	}
}