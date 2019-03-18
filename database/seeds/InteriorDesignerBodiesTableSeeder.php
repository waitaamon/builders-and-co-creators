<?php

use Illuminate\Database\Seeder;

class InteriorDesignerBodiesTableSeeder extends Seeder
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
                "title": "Interior Designers Association of Kenya",
                "description": "IDAK"
            }
        ]';

        foreach (json_decode($bodies) as $body) {
            $b = new \App\Models\Directory\Profession\InteriorDesignerBody();

            $b->title = $body->title;
            $b->description = $body->description;
            $b->save();
        }
    }
}
