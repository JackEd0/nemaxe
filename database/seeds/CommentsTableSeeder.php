<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commentList = array('Gros', 'Petit', 'Moyen');
        for ($i = 0; $i < 20; ++$i) {
            DB::table('comments')->insert([
                'content' => $commentList[rand(0,2)] . 'commentaire',
                'user_id' => rand(1,20),
                'card_id' => rand(1,20),
            ]);
        }
    }
}
