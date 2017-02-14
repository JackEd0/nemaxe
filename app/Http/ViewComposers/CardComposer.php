<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CardComposer
{
    public $cards;
    public $categories;
    public $card_number;
    public $cards_full;
    public $comments_number = array();

    /**
     * CardComposer constructor.
     */
    public function __construct()
    {

        $this->categories = DB::table('card_types')->get();
        $this->cards = DB::table('cards')
            ->select(
                'cards.id as id',
                'cards.number as number'
            )
            ->get();
        $this->card_number = DB::table('cards')->max('number') + 1;

        $this->cards_full = DB::table('cards')
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
        foreach($this->cards_full as $card) {
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
        $cards = $this->cards_full;
        $comments_number = $this->comments_number;
        $view->with(compact('cards', 'comments_number'));
    }
}
