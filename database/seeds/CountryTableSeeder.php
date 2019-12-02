<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_country')->delete();
		$country = array(
			array('id' => 1, 'nation_id' => 1 , 'country_code' => 'AM', 'country_name' => 'Armenia', 'calling_code' => '374', 'status' => 1),
			array('id' => 2, 'nation_id' => 1 , 'country_code' => 'AZ', 'country_name' => 'Azerbaijan', 'calling_code' => '994', 'status' => 1),
			array('id' => 3, 'nation_id' => 2 , 'country_code' => 'AT', 'country_name' => 'Austria', 'calling_code' => '43', 'status' => 1),
			array('id' => 4, 'nation_id' => 2 , 'country_code' => 'BE', 'country_name' => 'Belgium', 'calling_code' => '32', 'status' => 1),
			array('id' => 5, 'nation_id' => 2 , 'country_code' => 'CH', 'country_name' => 'Switzerland', 'calling_code' => '41', 'status' => 1),
		);
		DB::table('gg_country')->insert($country);
	}
}