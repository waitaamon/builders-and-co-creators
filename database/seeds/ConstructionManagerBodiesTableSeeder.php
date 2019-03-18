<?php

use Illuminate\Database\Seeder;

class ConstructionManagerBodiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bodies = '[
            {
                "title": "Association of Construction Managers of Kenya",
                "description": "ACMK"
            }
        ]';

        foreach (json_decode($bodies) as $body) {
            $b = new \App\Models\Directory\Profession\ConstructionManagerBody();

            $b->title = $body->title;
            $b->description = $body->description;
            $b->save();
        }
    }
}
