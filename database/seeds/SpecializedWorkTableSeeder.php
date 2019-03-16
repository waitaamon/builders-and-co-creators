<?php

use Illuminate\Database\Seeder;

class SpecializedWorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = '[
            {
                "title": "Plumbing",
                "description": ""
            },
            {
                "title": "Roofing",
                "description": ""
            },
            {
                "title": "Electrical",
                "description": ""
            },{
                "title": "ICT",
                "description": ""
            },{
                "title": "Organised Labor",
                "description": ""
            },{
                "title": "Bio Digester",
                "description": ""
            },
            {
                "title": "Solar Installation",
                "description": ""
            },
            {
                "title": "Water Proofing",
                "description": ""
            }, {
                "title": "Security Installation",
                "description": ""
            }
        ]';

        foreach (json_decode($types) as $type) {
            $t = new \App\Models\Directory\Profession\SpecializedWork();

            $t->title = $type->title;
            $t->description = $type->description;
            $t->save();
        }
    }
}
