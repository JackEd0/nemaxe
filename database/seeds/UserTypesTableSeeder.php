<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nameList = array('admin', 'client');
        for ($i = 0; $i < 2; $i++) {
            DB::table('card_types')->insert([
                'name' => $nameList[$i],
            ]);
        }
    }
}
