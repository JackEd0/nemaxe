<?php

use Illuminate\Database\Seeder;

class CardExercisesXrefTableSeeder extends Seeder
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
                DB::table('card_exercises_xref')->insert([
                    'card_id' =>  $i+1,
                    'exercise_id' => rand(1,5),
                    'question_id' => rand(1,19),
                    'question_order' => $j+1
                ]);
            }
        }
    }
}
