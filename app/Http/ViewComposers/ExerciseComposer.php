<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ExerciseComposer
{
    public $subjects;
    public $grades;
    public $durations;
    public $status;

    /**
     * ChapterComposer constructor.
     */
    public function __construct()
    {
        $this->subjects = DB::table('subjects')->get();
        $this->grades = DB::table('grades')->get();
        $this->durations = ['05:00' => '5'];
        for ($i=10; $i <= 60; $i=$i+5) {
            $this->durations[$i . ':00'] = $i;
        }
        $this->status = ['pubish' => 'Publie', 'private' => 'Prive'];
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $subjects = $this->subjects;
        $grades = $this->grades;
        $durations = $this->durations;
        $status = $this->status;
        $view->with(compact('subjects', 'grades', 'durations', 'status'));
    }

}
