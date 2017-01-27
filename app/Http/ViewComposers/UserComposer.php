<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class UserComposer
{
    public $users;

    /**
     * SkillComposer constructor.
     */
    public function __construct()
    {
        $this->users = DB::table('users')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('users', $this->users);
    }
}