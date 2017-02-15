<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HomeComposer
{
    public $cards;
    public $card_types;
    public $comments_number = array();

    /**
     * HomeComposer constructor.
     */
    public function __construct()
    {
        $this->card_types = DB::table('card_types')->get();
        $this->cards = DB::table('cards')
            ->where('cards.nature', 'exercise')
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            //->join('comments', 'comments.card_id', '=', 'cards.id')
            ->select('cards.*',
                'card_types.name as category',
                'users.username as author')
                //'count(comments.id) as comment_number')
            ->inRandomOrder()
            ->limit(6)
            ->get();
        foreach($this->cards as $card) {
            $this->comments_number[] = DB::table('comments')->where('card_id', $card->id)->count();
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
        $view->with(compact('cards', 'comments_number'));
    }
}
