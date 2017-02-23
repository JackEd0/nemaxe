<?php

use Illuminate\Database\Seeder;

class ChaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        1-Physics
        2-Chemistry
        3-Maths
        4-History
        */
        $name_list[1] = ['Physique 1', 'Physique 2', 'Physique 4'];
        $name_list[2] = ['Chimie 1', 'Chimie 2', 'Chimie 3'];
        $name_list[3] = ['Mathématiques 1', 'Mathématiques 2', 'Mathématiques 3'];
        $name_list[4] = ['Histoire 1', 'Histoire 2', 'Histoire 3'];
        foreach ($name_list as $key => $value) {
            for ($i = 0; $i < count($name_list[$key]); $i++) {
                DB::table('chapters')->insert([
                    'name' => $name_list[$key][$i],
                    'subject_id' => $key,
                ]);
            }
        }


    }
}
