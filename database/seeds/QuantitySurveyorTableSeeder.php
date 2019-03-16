<?php

use Illuminate\Database\Seeder;

class QuantitySurveyorTableSeeder extends Seeder
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
            $b = new \App\Models\Directory\Profession\QuantitySurveyor();

            $b->title = $body->title;
            $b->description = $body->description;
            $b->save();
        }
    }
}
