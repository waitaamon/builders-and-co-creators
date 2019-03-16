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
         $this->call([
             ArchitectBodiesTableSeeder::class,
             ContractorTypeTableSeeder::class,
             CountriesSeeder::class,
             CountyAndSubCountySeeder::class,
             EngineerBodiesTableSeeder::class,
             EngineerTypeTableSeeder::class,
             ProfessionBodiesTableSeeder::class,
             ProfessionTableSeeder::class,
            SupplierItemsTableSeeder::class,
             WorkerTypeTableSeeder::class,
         ]);
    }
}
