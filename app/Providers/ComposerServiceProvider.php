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
        $latest_cards = DB::table('cards')
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->join('grades', 'cards.grade_id', '=', 'grades.id')
            ->join('fields', 'cards.field_id', '=', 'fields.id')
            ->select('cards.*',
                'card_types.name as card_type_name',
                'users.username as user_username',
                'grades.short_name as grade_short_name',
                'fields.name as field_name')
            ->limit(4)
            ->get();
        $card_types_quantity = [];
        $card_types = DB::table('card_types')->get();
        foreach ($card_types as $card_type) {
            $card_types_quantity[$card_type->id] = DB::table('cards')->where('card_type_id', $card_type->id)->count();
        }
        view()->share('card_types', $card_types);
        view()->share('latest_cards', $latest_cards);
        view()->share('card_types_quantity', $card_types_quantity);
        view()->composer(
            'home', 'App\Http\ViewComposers\HomeComposer'
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
