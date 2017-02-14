<?php

use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titleList = array('Baccalauréat', 'Proba', 'BEPCD');
        $contentList = array('post01.jpg', 'post02.jpg', 'post03.jpg');
        $natureList = array('exercise', 'solution');
        for ($i = 0; $i < 20; $i++) {
            //Ajout de fiches de type compris entre 1 et 7
            DB::table('cards')->insert([
                'card_type_id' => ($i % 3) + 1,
                'user_id' => $i + 1,
                'number' => $i + 1,
                'title' =>  $titleList[rand(0,2)] . ' of ' . '199' . $i%9,
                'content' => $contentList[($i % 3)],
                'nature' => $natureList[($i % 2)]
            ]);
        }
    }
}
