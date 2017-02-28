<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $temp_exercises = DB::select('SELECT DISTINCT card_id FROM card_exercises ');
        $published_card = [];
        foreach ($temp_exercises as $value) {
            $published_card[] = $value->card_id;
        }
        $latest_cards = DB::table('cards')
            ->whereIn('cards.id', $published_card)
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->select('cards.*',
                'card_types.name as card_type_name',
                'users.username as user_username')
            ->limit(4)
            ->get();
        view()->share('card_types', DB::table('card_types')->get());
        view()->share('latest_cards', $latest_cards);
        view()->composer(
            'home', 'App\Http\ViewComposers\HomeComposer'
        );
        view()->composer(
            'cards.cards_form', 'App\Http\ViewComposers\CardComposer'
        );
        view()->composer(
            'cards.cards_index', 'App\Http\ViewComposers\CardComposer@compose_index'
        );
        view()->composer(
            'chapters.chapters_index', 'App\Http\ViewComposers\ChapterComposer'
        );
        view()->composer(
            'fields.fields_index', 'App\Http\ViewComposers\FieldComposer'
        );
        view()->composer(
            'exercises.exercises_form', 'App\Http\ViewComposers\ExerciseComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
