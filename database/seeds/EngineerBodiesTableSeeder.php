<?php

use Illuminate\Database\Seeder;

class EngineerBodiesTableSeeder extends Seeder
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
                "title": "Engineers Board Of Kenya",
                "description": "EBK"
            },
            {
                "title": "Institution of Engineers of Kenya",
                "description": ""
            },
            {
                "title": "Kenya Engineering Technology Registration Board",
                "description": "KETRB"
            },
            {
                "title": "Energy Regulatory commission",
                "description": ""
            }
        ]';

        foreach (json_decode($bodies) as $body) {
            $b = new \App\Models\Directory\Profession\EngineerBody();

            $b->title = $body->title;
            $b->description = $body->description;
            $b->save();
        }
    }
}
