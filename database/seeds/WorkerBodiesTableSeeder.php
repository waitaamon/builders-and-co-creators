<?php

use Illuminate\Database\Seeder;

class WorkerBodiesTableSeeder extends Seeder
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
                "title": "National Construction Authority",
                "description": "NCA"
            },
            {
                "title": "Kenya Engineering Technology Registration Board",
                "description": "KETRB"
            }
        ]';

        foreach (json_decode($bodies) as $body) {
            $b = new \App\Models\Directory\Profession\WorkerBody();

            $b->title = $body->title;
            $b->description = $body->description;
            $b->save();
        }
    }
}
