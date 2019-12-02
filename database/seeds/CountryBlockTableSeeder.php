<?php

use Illuminate\Database\Seeder;

class CountryBlockTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
	public function run()
	{
		DB::table('gg_country_block')->delete();
		$countryBlock = array(
			array('id' => 1, 'name' => 'Western Asia' ,'status' => "1"),
			array('id' => 2, 'name' => 'Western Europe' ,'status' => "1")
		);
		DB::table('gg_country_block')->insert($countryBlock);
	}
}