<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UsersTablesSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
        $this->call(LabelsTableSeeder::class);
        $this->call(LabelTranslationsTableSeeder::class);

        $this->call(ModulesTableSeeder::class);
        $this->call(ModuleFieldsTableSeeder::class);
        $this->call(ModuleFieldsValueTableSeeder::class);

        //country block
        $this->call(CountryBlockTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(CityTableSeeder::class);

        $this->call(PermissionTableSeeder::class);

    }
}
