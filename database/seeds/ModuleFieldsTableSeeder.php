<?php

use Illuminate\Database\Seeder;

class ModuleFieldsTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_module_fields')->delete();
		$moduleFields = array(
			array('id' => 1,'module_id' => 1 ,'field_name' => 'Purpose', 'field_type' => 'multiselect', 'status' => 1),
			array('id' => 2,'module_id' => 1 ,'field_name' => 'Gender', 'field_type' => 'multiselect', 'status' => 1),
			array('id' => 3,'module_id' => 1 ,'field_name' => 'Subject', 'field_type' => 'multiselect', 'status' => 1)
		);
		DB::table('gg_module_fields')->insert($moduleFields);
	}
}