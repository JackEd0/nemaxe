<?php

use Illuminate\Database\Seeder;

class CardExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 40; $i++) {
            DB::table('card_exercises')->insert([
                'card_id' =>  rand(1,19),
                'exercise_id' => rand(1,19)
            ]);
        }
    }
}
