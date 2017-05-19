<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descriptions = [
            'Lorem ipsum dolor sit amet',
            'Lorem ipsum dolor sit amet consectetur',
            'adipiscing elit',
            'Lorem ipsum dolor sit amet consectetur adipiscing elit',
        ];
        for ($i=0; $i < 20; $i++) {
            DB::table('questions')->insert([
                'description' => $descriptions[rand(0,3)]
            ]);
        }
    }
}
