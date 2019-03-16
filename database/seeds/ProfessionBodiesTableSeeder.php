<?php

use Illuminate\Database\Seeder;

class ProfessionBodiesTableSeeder extends Seeder
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
            },{
                "title": "Kenya Engineering Technology Registration Board",
                "description": "KETRB"
            },{
                "title": "Kenya Federation Of Master Builders",
                "description": "KFMA"
            },{
                "title": "Energy Regulatory Commision",
                "description": "ERC"
            },{
                "title": "I am Not Registered to any",
                "description": ""
            }
        ]';

        foreach (json_decode($bodies) as $body) {
            $b = new \App\Models\Directory\Profession\ProfessionalBody();

            $b->title = $body->title;
            $b->description = $body->description;
            $b->save();
        }
    }
}
