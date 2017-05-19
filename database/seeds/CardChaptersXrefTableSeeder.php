<?php

use Illuminate\Database\Seeder;

class CardChaptersXrefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            for ($j=0; $j < 2; $j++) {
                DB::table('card_chapters_xref')->insert([
                    'card_id' => $i + 1,
                    'chapter_id' => ($i % 3) + 1,
                ]);
            }
        }
    }
}
