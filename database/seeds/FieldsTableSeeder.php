<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'serie literaire'
        $fields = [
            'A4' => 'Literaire',
            'C' => 'Scientifique',
            'D' => 'Generale',
            'E' => 'Electrique',
            'F' => 'Technique',
            'G' => 'Gestion'
        ];
        foreach ($fields as $key => $value) {
            DB::table('fields')->insert([
                'name' => $key,
                'description' => $value,
            ]);
        }
    }
}
