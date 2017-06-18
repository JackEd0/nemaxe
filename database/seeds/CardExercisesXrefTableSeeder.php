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
                for ($k=0; $k < 3; $k++) {
                    DB::table('card_exercises_xref')->insert([
                        'card_id' =>  $i+1,
                        'exercise_id' => ($j%19)+1,
                        'question_id' => ($k%19)+1,
                        'question_order' => $k+1
                    ]);
                }
            }
        }
    }
}
