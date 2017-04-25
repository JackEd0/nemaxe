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
        foreach ($descriptions as $description) {
            DB::table('questions')->insert([
                'description' => $description
            ]);
        }
    }
}
