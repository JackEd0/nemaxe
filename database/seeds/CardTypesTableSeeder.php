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
        $name_list = ['Baccalauréat', 'Proba', 'BEPCD'];
        for ($i = 0; $i < count($name_list); $i++) {
            DB::table('card_types')->insert([
                'name' => $name_list[$i],
            ]);
        }
    }
}
