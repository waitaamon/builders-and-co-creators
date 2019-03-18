<?php

use Illuminate\Database\Seeder;

class MembershipTableSeeder extends Seeder
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
                "title": "Home Owner",
                "description": "I am Building or aspiring to own a home"
            },
            {
                "title": "Contractor",
                "description": ""
            },
            {
                "title": "Skilled Worker",
                "description": "laborer, masons, carpenters, electrician,foreman,plumbers etc"
            },
            {
                "title": "Supplier",
                "description": ""
            },
            {
                "title": "Professional",
                "description": ""
            },
            {
                "title": "Associate",
                "description": ""
            }
        ]';

        foreach (json_decode($types) as $type) {
            $p = new \App\Models\Directory\Profession\Membership();

            $p->title = $type->title;
            $p->slug = str_slug($type->title);
            $p->description = $type->description;
            $p->save();
        }
    }
}
