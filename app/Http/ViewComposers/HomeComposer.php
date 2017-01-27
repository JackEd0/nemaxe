<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HomeComposer
{
    public $experiences;
    public $educations;
    public $realisations;
    public $skills_categories = array();
    public $skills_categories_title = array();
    public $skills_categories_number;

    /**
     * HomeComposer constructor.
     */
    public function __construct()
    {
        $this->skills_categories = ["language", "framework", "software", "platform"];
        $this->skills_categories_title = ["Langages", "Frameworks", "Logiciels", "Plateformes"];
        $this->skills_categories_number = count($this->skills_categories);
        for ($i = 0; $i < $this->skills_categories_number; $i++) {
            $this->skills[] = DB::table('skills')
                ->where('category', $this->skills_categories[$i])
                ->get();
        }
        $this->experiences = DB::table('experiences')->orderBy('time_end', 'desc')
            ->limit(3)
            ->get();
        $this->educations = DB::table('educations')->get();
        $this->realisations = DB::table('realisations')->orderBy('creation_date', 'desc')
            ->limit(3)
            ->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $skills = $this->skills;
        $skills_categories_title = $this->skills_categories_title;
        $skills_categories_number = $this->skills_categories_number;
        $educations = $this->educations;
        $experiences = $this->experiences;
        $realisations = $this->realisations;
        $view->with(compact('experiences', 'educations', 'realisations',
            'skills', 'skills_categories_title', 'skills_categories_number'));
    }
}