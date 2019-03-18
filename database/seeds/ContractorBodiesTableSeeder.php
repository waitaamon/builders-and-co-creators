<?php

use Illuminate\Database\Seeder;

class ContractorBodiesTableSeeder extends Seeder
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
            },
            {
                "title": "Kenya Federation Of Master Builders",
                "description": "KFMB"
            }
        ]';

        foreach (json_decode($bodies) as $body) {
            $b = new \App\Models\Directory\Profession\ContractorBody();

            $b->title = $body->title;
            $b->description = $body->description;
            $b->save();
        }
    }
}
