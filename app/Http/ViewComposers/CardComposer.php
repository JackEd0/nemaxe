<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CardComposer
{
    public $cards;
    public $comments_number = [];
    public $exercises = [];
    public $subjects;
    public $card_types;
    public $fields;
    public $grades;
    public $status;

    /**
     * CardComposer constructor.
     */
    public function __construct()
    {
        $this->cards = DB::table('cards')
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->select('cards.*',
                'card_types.name as card_type_name',
                'users.username as user_username')
            ->get();
        foreach($this->cards as $card) {
            $this->comments_number[] = DB::table('comments')->where('card_id', $card->id)->count();
            $temp_exercises = DB::table('card_exercises')->where('card_id', $card->id)->first();
            $this->exercises[] = DB::table('exercises')->where('id', $temp_exercises->exercise_id)->first();
        }

        $this->subjects = DB::table('subjects')->get();
        $this->card_types = DB::table('card_types')->get();
        $this->fields = DB::table('fields')->get();
        $this->grades = DB::table('grades')->get();
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
        $card_types = $this->card_types;
        $fields = $this->fields;
        $grades = $this->grades;
        $status = $this->status;
        $view->with(compact('subjects', 'card_types', 'fields', 'grades', 'status'));
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose_index(View $view)
    {
        $cards = $this->cards;
        $comments_number = $this->comments_number;
        $exercises = $this->exercises;
        $view->with(compact('cards', 'comments_number', 'exercises'));
    }
}
