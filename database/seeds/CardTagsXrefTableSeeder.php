<?php

use Illuminate\Database\Seeder;

class CardTagsXrefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            //Ajout de fiches de type compris entre 1 et 7
            DB::table('card_tags_xref')->insert([
                'card_id' => $i+1,
                'tag_id' => ($i%6) +1,
            ]);
        }
    }
}
