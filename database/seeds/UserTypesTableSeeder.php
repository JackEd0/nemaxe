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
        $name_list = ['Administrateur', 'Editeur', 'Abonne'];
        for ($i = 0; $i < count($name_list); $i++) {
            DB::table('user_types')->insert([
                'name' => $name_list[$i],
            ]);
        }
    }
}
