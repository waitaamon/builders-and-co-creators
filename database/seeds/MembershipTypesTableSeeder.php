<?php

use Illuminate\Database\Seeder;

class MembershipTypesTableSeeder extends Seeder
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
                "membership_id": "2",
                "description": "Construction of buildings- Houses, apartments, Roofing etc"
            },
            {
                "title": "Civil works",
                "membership_id": "2",
                "description": "Construction of Roads, Bridges, sewers, storm water, power stations, water treatments, etc"
            },
            {
                "title": "MEP Contractor",
                "membership_id": "2",
                "description": "Mechanical, Electrical, Plumbing Contractor"
            },
            {
                "title": "Interior fit-outs and deco",
                "membership_id": "2",
                "description":  "Interiors-painting, gypsum fitting, lights etc"
            },
            {
                "title": "Landscaping",
                "membership_id": "2",
                "description": ""
            },
            {
                "title": "Plumbing",
                "membership_id": "2",
                "is_specialized": "true",
                "description": ""
            },
            {
                "title": "Roofing",
                "membership_id": "2",
                "is_specialized": "true",
                "description": ""
            },
            {
                "title": "Electrical",
                "membership_id": "2",
                "is_specialized": "true",
                "description": ""
            },
            {
                "title": "ICT",
                "membership_id": "2",
                "is_specialized": "true",
                "description": ""
            },
            {
                "title": "Organised Labor",
                "membership_id": "2",
                "is_specialized": "true",
                "description": ""
            },
            {
                "title": "Bio Digester",
                "membership_id": "2",
                "is_specialized": "true",
                "description": ""
            },
            {
                "title": "Solar Installation",
                "membership_id": "2",
                "is_specialized": "true",
                "description": ""
            },
            {
                "title": "Water Proofing",
                "membership_id": "2",
                "is_specialized": "true",
                "description": ""
            }, 
            {
                "title": "Security Installation",
                "membership_id": "2",
                "is_specialized": "true",
                "description": ""
            },
            {
                "title": "Architect",
                "membership_id": "5",
                "description": ""
            },
            {
                "title": "Landscape Architect",
                "membership_id": "5",
                "description": ""
            },
            {
                "title": "Engineer",
                "membership_id": "5",
                "description": ""
            },
            {
                "title": "Quantity Surveyor",
                "membership_id": "5",
                "description": ""
            },
            {
                "title": "Land Surveyor",
                "membership_id": "5",
                "description": ""
            },
            {
                "title": "Interior Designer",
                "membership_id": "5",
                "description": "design"
            },
            {
                "title": "Construction Manager",
                "membership_id": "5",
                "description": ""
            },
            {
                "title": "Environmental Officer",
                "membership_id": "5",
                "description": ""
            },
            {
                "title": "Safety Officer",
                "membership_id": "5",
                "description": ""
            },
            {
                "title": "Civil Engineer",
                "membership_id": "5",
                "is_engineer": "true",
                "description": ""
            },
            {
                "title": "Structural Engineer",
                "membership_id": "5",
                "is_engineer": "true",
                "description": ""
            },
            {
                "title": "Mechanical Engineer",
                "membership_id": "5",
                "is_engineer": "true",
                "description": ""
            },
            {
                "title": "Electrical Engineer",
                "membership_id": "5",
                "is_engineer": "true",
                "description": ""
            },
            {
                "title": "Property Agent",
                "membership_id": "5",
                "description": ""
            },
            {
                "title": "Steel Bars and associated Products",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Plants",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Landscaping Decorations",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Lighting and other Electrical Items",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Curtains and Rods",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Wallpapers",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Furniture",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Concrete and Concrete Products",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Floor and Wall Tiles",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Sinks, Basins, Toilet Bowls",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Plastic Pipes",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Steel pipes",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Floor and Wall Tiles",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Roofing Tiles and Sheets",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Glass and Associated Products",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Machine Cut Stones",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Bricks",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Quarry Stones",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "EPS Panels",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Ballast",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Sand",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Timber and associated Products",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Cement",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Carpets",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Gypsum and Other associated Boards",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Transport services",
                "membership_id": "4",
                "description": ""
            },
            {
                "title": "Mason",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Plumber",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Electrician",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Tile Fixer",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Carpenter",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Casual Labourer",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Glass fixer",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "welder",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Painter",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Steel fixer",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Machine Operator",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Foreman",
                "membership_id": "3",
                "description": ""
            },
            {
                "title": "Mama Ntilie",
                "membership_id": "3",
                "description": "Food Vendor"
            }
        ]';

        foreach (json_decode($types) as $type) {
            $t = new \App\Models\Directory\Profession\MembershipType();

            $t->membership_id = $type->membership_id;
            $t->is_engineer = isset($type->is_engineer) ? true : false;
            $t->is_specialized = isset($type->is_specialized) ? true : false;
            $t->title = $type->title;
            $t->description = $type->description;
            $t->save();
        }
    }
}
