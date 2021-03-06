<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Config;
use Session;

class Language
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        $raw_locale = Session::get('locale');
        if (array_key_exists($raw_locale, Config::get('app.locales'))) {
            $locale = $raw_locale;
        } else {
            $locale = Config::get('app.locale');
        }
        // var_dump($locale); die('');
        // $locale_lang = App::getLocale();
        App::setLocale($locale);
        // var_dump(App::getLocale());die('');
        return $next($request);
    }
}
