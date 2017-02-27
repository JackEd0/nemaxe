<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class FieldComposer
{
    public $fields;

    /**
     * FieldComposer constructor.
     */
    public function __construct()
    {
        $this->fields = DB::table('fields')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('fields', $this->fields);
    }

}
