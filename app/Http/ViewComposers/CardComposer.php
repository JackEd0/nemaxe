<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CardComposer
{
    public $cards;
    public $comments_number = array();
    public $exercises = [];

    /**
     * CardComposer constructor.
     */
    public function __construct()
    {
        $temp_exercises = DB::select('SELECT DISTINCT card_id FROM card_exercises ');
        $published_card = [];
        foreach ($temp_exercises as $value) {
            $published_card[] = $value->card_id;
        }
        $this->cards = DB::table('cards')
            ->whereIn('cards.id', $published_card)
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
        $categories = $this->categories;
        $card_number = $this->card_number;
        $view->with(compact('cards', 'categories', 'card_number'));
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
