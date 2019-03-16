<?php

use Illuminate\Database\Seeder;

class SupplierItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = '[
            {
                "title": "Steel Bars and associated Products",
                "description": ""
            },{
                "title": "Plants",
                "description": ""
            },{
                "title": "Landscaping Decorations",
                "description": ""
            },{
                "title": "Lighting and other Electrical Items",
                "description": ""
            },{
                "title": "Curtains and Rods",
                "description": ""
            },{
                "title": "Wallpapers",
                "description": ""
            },{
                "title": "Furniture",
                "description": ""
            },{
                "title": "Concrete and Concrete Products",
                "description": ""
            },{
                "title": "Floor and Wall Tiles",
                "description": ""
            },{
                "title": "Sinks, Basins, Toilet Bowls",
                "description": ""
            },{
                "title": "Plastic Pipes",
                "description": ""
            },{
                "title": "Steel pipes",
                "description": ""
            },{
                "title": "Floor and Wall Tiles",
                "description": ""
            },{
                "title": "Roofing Tiles and Sheets",
                "description": ""
            },{
                "title": "Glass and Associated Products",
                "description": ""
            },{
                "title": "Machine Cut Stones",
                "description": ""
            },{
                "title": "Bricks",
                "description": ""
            },{
                "title": "Quarry Stones",
                "description": ""
            },{
                "title": "EPS Panels",
                "description": ""
            },{
                "title": "Ballast",
                "description": ""
            },{
                "title": "Sand",
                "description": ""
            },{
                "title": "Timber and associated Products",
                "description": ""
            },{
                "title": "Cement",
                "description": ""
            },{
                "title": "Carpets",
                "description": ""
            },{
                "title": "Gypsum and Other associated Boards",
                "description": ""
            },{
                "title": "Transport services",
                "description": ""
            }
        ]';

        foreach (json_decode($items) as $item) {
            $itm = new \App\Models\Directory\Profession\SupplierItem();

            $itm->title = $item->title;
            $itm->description = $item->description;
            $itm->save();
        }
    }
}
