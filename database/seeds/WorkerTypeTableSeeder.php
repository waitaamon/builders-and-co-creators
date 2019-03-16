<?php

use Illuminate\Database\Seeder;

class WorkerTypeTableSeeder extends Seeder
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
                "title": "Mason",
                "description": ""
            },
            {
                "title": "Plumber",
                "description": ""
            },{
                "title": "Electrician",
                "description": ""
            },{
                "title": "Tile Fixer",
                "description": ""
            },{
                "title": "Carpenter",
                "description": ""
            },{
                "title": "Casual Labourer",
                "description": ""
            },{
                "title": "Glass fixer",
                "description": ""
            },{
                "title": "welder",
                "description": ""
            },{
                "title": "Painter",
                "description": ""
            },{
                "title": "Steel fixer",
                "description": ""
            },{
                "title": "Machine Operator",
                "description": ""
            },{
                "title": "Foreman",
                "description": ""
            },{
                "title": "Safety Officer",
                "description": ""
            },{
                "title": "Mama Ntilie",
                "description": "Food Vendor"
            }
        ]';

        foreach (json_decode($types) as $type) {
            $t = new \App\Models\Directory\Profession\WorkerType();

            $t->title = $type->title;
            $t->description = $type->description;
            $t->save();
        }
    }
}
