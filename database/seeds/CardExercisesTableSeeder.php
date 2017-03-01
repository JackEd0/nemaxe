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
        for ($i = 0; $i < 20; $i++) {
            DB::table('card_exercises')->insert([
                'card_id' =>  $i+1,
                'exercise_id' => rand(1,19)
            ]);
        }
        for ($i = 0; $i < 20; $i++) {
            DB::table('card_exercises')->insert([
                'card_id' =>  rand(1,19),
                'exercise_id' => rand(1,19)
            ]);
        }
    }
}
