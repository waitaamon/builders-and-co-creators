<?php

use Illuminate\Database\Seeder;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professions = '[
            {
                "title": "Architect",
                "description": ""
            },
            {
                "title": "Landscape Architect",
                "description": ""
            },
            {
                "title": "Engineer",
                "description": ""
            },
            {
                "title": "Quantity Surveyor",
                "description": ""
            },
            {
                "title": "Land Surveyor",
                "description": ""
            },
            {
                "title": "Interior Designer",
                "description": "design"
            },
            {
                "title": "Construction Manager",
                "description": ""
            },
            {
                "title": "Environmental Officer",
                "description": ""
            },
            {
                "title": "Safety Officer",
                "description": ""
            },
            {
                "title": "Property Agent",
                "description": ""
            }
        ]';

        foreach (json_decode($professions) as $profession) {
            $p = new \App\Models\Directory\Profession\Profession();

            $p->title = $profession->title;
            $p->description = $profession->description;
            $p->save();
        }
    }
}
