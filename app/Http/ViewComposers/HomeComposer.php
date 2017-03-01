<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HomeComposer
{
    public $cards;
    public $comments_number = array();
    public $exercises = [];


    /**
     * HomeComposer constructor.
     */
    public function __construct()
    {
        $this->cards = DB::table('cards')
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->select('cards.*',
                'card_types.name as card_type_name',
                'users.username as user_username')
            ->limit(6)
            ->get();
        foreach($this->cards as $card) {
            $this->comments_number[] = DB::table('comments')->where('card_id', $card->id)->count();
            $temp_exercises = DB::table('card_exercises')->where('card_id', $card->id)->first();
            $this->exercises[] = DB::table('exercises')->where('id', $temp_exercises->exercise_id)->first();
        }


    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $cards = $this->cards;
        $comments_number = $this->comments_number;
        $exercises = $this->exercises;
        $view->with(compact('cards', 'comments_number', 'exercises'));
    }
}
