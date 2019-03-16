<?php

use Illuminate\Database\Seeder;

class EngineerTypeTableSeeder extends Seeder
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
                "title": "Civil Engineer",
                "description": ""
            },{
                "title": "Structural Engineer",
                "description": ""
            },{
                "title": "Mechanical Engineer",
                "description": ""
            },{
                "title": "Electrical Engineer",
                "description": ""
            }
        ]';

        foreach (json_decode($types) as $type) {
            $t = new \App\Models\Directory\Profession\EngineerType();

            $t->title = $type->title;
            $t->description = $type->description;
            $t->save();
        }
    }
}
