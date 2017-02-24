<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ChapterComposer
{
    public $chapters;
    public $subjects;

    /**
     * ChapterComposer constructor.
     */
    public function __construct()
    {
        $this->chapters = DB::table('chapters')
        ->join('subjects', 'subjects.id', '=', 'chapters.subject_id')
        ->select(
            'chapters.*',
            'subjects.name as subject_name')
        ->get();
        $this->subjects = DB::table('subjects')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $chapters = $this->chapters;
        $subjects = $this->subjects;
        $view->with(compact('chapters', 'subjects'));
    }

}
