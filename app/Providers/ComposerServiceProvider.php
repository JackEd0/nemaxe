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
        view()->share('card_types', DB::table('card_types')->get());
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
