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
        $contentList = array('Physique.jpg', 'Chimie.jpg', 'Maths.jpg');
        for ($i = 0; $i < 50; $i++) {
            //Ajout de fiches de type compris entre 1 et 7
            DB::table('cards')->insert([
                'card_type_id' => ($i % 3) + 1,
                'title' =>  $titleList[rand(0,2)],
                'content' => $contentList[rand(0,2)],
                'description' => 'Examen de 199' . rand(0,9),
                'date' => '199' . rand(0,9),
            ]);
        }
    }
}
