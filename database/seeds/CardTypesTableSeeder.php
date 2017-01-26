<?php

use Illuminate\Database\Seeder;

class CardTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nameList = array('physics', 'chemistry', 'maths', 'history');
        for ($i = 0; $i < 4; $i++) {
            DB::table('card_types')->insert([
                'name' => $nameList[$i],
            ]);
        }
    }
}
