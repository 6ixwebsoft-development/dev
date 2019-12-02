<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_region')->delete();
		$region = array(
			array('id' => 1, 'country_id' => 1 , 'region_name' => 'Lori', 'status' => 1),
			array('id' => 2, 'country_id' => 1 , 'region_name' => 'Ararat', 'status' => 1),
			array('id' => 3, 'country_id' => 2 , 'region_name' => 'Shirvan', 'status' => 1),
			array('id' => 4, 'country_id' => 2 , 'region_name' => 'Ganjabasar', 'status' => 1),
			array('id' => 5, 'country_id' => 3 , 'region_name' => 'Burgenland', 'status' => 1),
			array('id' => 6, 'country_id' => 3 , 'region_name' => 'Carinthia', 'status' => 1),
			array('id' => 7, 'country_id' => 3 , 'region_name' => 'Styria', 'status' => 1),
			array('id' => 8, 'country_id' => 4 , 'region_name' => 'Flemish', 'status' => 1),
			array('id' => 9, 'country_id' => 4 , 'region_name' => 'Walloon', 'status' => 1),
			array('id' => 10, 'country_id' => 5 , 'region_name' => 'Zürich', 'status' => 1),
			array('id' => 11, 'country_id' => 5 , 'region_name' => 'Bern', 'status' => 1),
			array('id' => 12, 'country_id' => 5 , 'region_name' => 'Zug', 'status' => 1),
		);
		DB::table('gg_region')->insert($region);
	}
}