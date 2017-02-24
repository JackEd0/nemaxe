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
                'title' =>  $titleList[rand(0,2)] . ' of ' . '199' . $i%9,
                'card_type_id' => ($i % 3) + 1,
                'year' => '199' . rand(0,9) . '-01-01',
                'subject_id' => rand(1,3),
                'field_id' => rand(1,3),
                'grade_id' => rand(1,3)
            ]);
        }
    }
}
