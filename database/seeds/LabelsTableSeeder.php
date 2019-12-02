<?php

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_labels')->delete();
		$labels = array(
			array('id' => 1, 'group_id' => '1', 'label' => 'color')	
		);
		DB::table('gg_labels')->insert($labels);
	}
}