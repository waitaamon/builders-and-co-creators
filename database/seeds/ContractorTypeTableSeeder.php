<?php

use Illuminate\Database\Seeder;

class ContractorTypeTableSeeder extends Seeder
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
                "title": "Building works",
                "description": "Construction of buildings- Houses, apartments, Roofing etc"
            },
            {
                "title": "Civil works",
                "description": "Construction of Roads, Bridges, sewers, storm water, power stations, water treatments, etc"
            },
            {
                "title": "MEP Contractor",
                "description": "Mechanical, Electrical, Plumbing Contractor"
            },
            {
                "title": "Interior fit-outs and deco",
                "description":  "Interiors-painting, gypsum fitting, lights etc"
            },
            {
                "title": "Landscaping",
                "description": ""
            }
        ]';

        foreach (json_decode($types) as $type) {
            $t = new \App\Models\Directory\Profession\ContractorType();

            $t->title = $type->title;
            $t->description = $type->description;
            $t->save();
        }
    }
}
