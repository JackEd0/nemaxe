<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_list = ['Terminal', 'Premiere', 'Seconde', 'Troisieme'];
        for ($i = 0; $i < count($name_list); $i++) {
            DB::table('grades')->insert([
                'name' => $name_list[$i],
            ]);
        }
    }
}
