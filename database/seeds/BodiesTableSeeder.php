<?php

use Illuminate\Database\Seeder;

class BodiesTableSeeder extends Seeder
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
                "title": "Board of Registration of Architects and Quantity Surveyors",
                "description": "BORAQS"
            },
            {
                "title": "Architectural Association Of Kenya",
                "description": "AAK"
            },
             {
                "title": "Association of Construction Managers of Kenya",
                "description": "ACMK"
            },
            {
                "title": "National Construction Authority",
                "description": "NCA"
            },
            {
                "title": "Kenya Federation Of Master Builders",
                "description": "KFMB"
            },
             {
                "title": "Engineers Board Of Kenya",
                "description": "EBK"
            },
            {
                "title": "Institution of Engineers of Kenya",
                "description": "IEK"
            },
            {
                "title": "Kenya Engineering Technology Registration Board",
                "description": "KETRB"
            },
            {
                "title": "Energy Regulatory commission",
                "description": "ERC"
            },
            {
                "title": "Interior Designers Association of Kenya",
                "description": "IDAK"
            },
            {
                "title": "Quantity Surveyors International",
                "description": "QSI"
            },
            {
                "title": "The Royal Institution of Chartered Surveyors",
                "description": "RICS"
            },
            {
                "title": "Institute of Quantity Surveyors of Kenya",
                "description": "IQS"
            }
        ]';

        foreach (json_decode($bodies) as $body) {
            $b = new \App\Models\Directory\Profession\Body();
            $b->title = $body->title;
            $b->description = $body->description;
            $b->save();
        }
    }
}
