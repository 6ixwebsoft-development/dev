<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_city')->delete();
		$cities = array(
			array('id' => 1, 'country_id' => 1 , 'region_id' => 1 , 'city_name' => 'Vanadzor', 'status' => 1),
			array('id' => 2, 'country_id' => 1 , 'region_id' => 2 , 'city_name' => 'Vagharshapat', 'status' => 1),
			array('id' => 3, 'country_id' => 2 , 'region_id' => 3 , 'city_name' => 'Baku', 'status' => 1),
			array('id' => 4, 'country_id' => 2 , 'region_id' => 4 , 'city_name' => 'Ganja', 'status' => 1),
			array('id' => 5, 'country_id' => 3 , 'region_id' => 5 , 'city_name' => 'Vienna', 'status' => 1),
			array('id' => 6, 'country_id' => 3 , 'region_id' => 6 , 'city_name' => 'Graz', 'status' => 1),
			array('id' => 7, 'country_id' => 3 , 'region_id' => 7 , 'city_name' => 'Linz', 'status' => 1),
			array('id' => 8, 'country_id' => 4 , 'region_id' => 8 , 'city_name' => 'Ghent', 'status' => 1),
			array('id' => 9, 'country_id' => 4 , 'region_id' => 9 , 'city_name' => 'Charleroi', 'status' => 1),
			array('id' => 10, 'country_id' => 5 , 'region_id' => 10 , 'city_name' => 'Zurich', 'status' => 1),
			array('id' => 11, 'country_id' => 5 , 'region_id' => 11 , 'city_name' => 'Geneva', 'status' => 1),
			array('id' => 12, 'country_id' => 5 , 'region_id' => 12 , 'city_name' => 'Basel', 'status' => 1),

		);
		DB::table('gg_city')->insert($cities);
	}
}