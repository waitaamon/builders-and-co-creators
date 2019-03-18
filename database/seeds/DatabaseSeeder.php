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
             BodiesTableSeeder::class,
             CountriesSeeder::class,
             CountyAndSubCountySeeder::class,
             MembershipTableSeeder::class,
             MembershipTypesTableSeeder::class,
         ]);
    }
}
