<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_list = ['Physique', 'Chimie', 'Mathématiques', 'Histoire'];
        for ($i = 0; $i < count($name_list); $i++) {
            DB::table('subjects')->insert([
                'name' => $name_list[$i],
            ]);
        }
    }
}
