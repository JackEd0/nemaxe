<?php

use Illuminate\Database\Seeder;

class CardTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            //Ajout de fiches de type compris entre 1 et 7
            DB::table('card_tags')->insert([
                'card_id' => $i+1,
                'tag_id' => ($i%6) +1,
            ]);
        }
    }
}
