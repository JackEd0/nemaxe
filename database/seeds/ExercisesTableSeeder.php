<?php

use Illuminate\Database\Seeder;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title_list = array('la suite de fibonacci', 'Les photons', 'Les moments de force');
        $content_list =
            'Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam,' .
            ' non nulla levius actitata constaret, post multorum clades Apollinares ambo pater ' .
            'et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet ' .
            'suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, ' .
            'fractis cruribus occiduntur.' . '<br />' .
            'Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis ' .
            'consarcinantibus insidias graves apud Constantium, cetera medium principem sed ' .
            'siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem ' .
            'et in hoc causarum titulo dissimilem sui.';
        $nature_list = array('exercise', 'solution');
        for ($i = 0; $i < 20; $i++) {
            DB::table('exercises')->insert([
                'title' =>  $titleList[rand(0,count($title_list)-1)],
                'content' => $content_list,
                'subject_id' => rand(1,4),
                'grade_id' => rand(1,2),
                'duration' => '00:' . rand(2,5) . '0:00'
            ]);
        }
    }
}
