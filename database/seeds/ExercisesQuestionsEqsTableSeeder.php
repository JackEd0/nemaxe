<?php

use Illuminate\Database\Seeder;

class ExercisesQuestionsEqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            for ($j=0; $j < 4; $j++) {
                DB::table('exercises_questions_eqs')->insert([
                    'order' => $j+1,
                    'exercise_id' => $i+1,
                    'question_id' => $j+1,
                ]);
            }
        }
    }
}
