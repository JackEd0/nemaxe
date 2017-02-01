<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nameList = array('Physics', 'Chemistry', 'Maths', 'History', 'Baccalauréat', 'Proba', 'BEPCD');
        for ($i = 0; $i < 7; $i++) {
            DB::table('tags')->insert([
                'name' => $nameList[$i],
            ]);
        }
    }
}
