<?php

use Illuminate\Database\Seeder;

class ArchitectBodiesTableSeeder extends Seeder
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
                "title": "Board of Registration of Architects and Quantity Surveyors",
                "description": "BORAQS"
            },{
                "title": "Architectural Association Of Kenya",
                "description": "AAK"
            }
        ]';

        foreach (json_decode($bodies) as $body) {
            $b = new \App\Models\Directory\Profession\ArchitectBody();

            $b->title = $body->title;
            $b->description = $body->description;
            $b->save();
        }
    }
}
