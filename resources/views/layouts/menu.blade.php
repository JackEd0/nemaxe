<?php
$navbar = [
    'home' => '', 'chapters' => '', 'fields' => '', 'grades' => '', 'card_types' => '',
    'subjects' => '', 'login' => '', 'register' => '', 'admin' => '', 'profil' => '',
    'comments' => '', 'cards' => '', 'users' => '', 'exercises' => '', 'questions' => '',
    'search' => ''
];
if (isset($subbar)) {
    $navbar[$subbar] = 'active';
}
$locale_lang = \App::getLocale();
?>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">NEMAXE.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
            <ul class="nav navbar-nav">
                <li class="{{ $navbar['search'] }}"><a href="#" onclick="$('#quick_search_form').submit()">{{ __('tests') }}</a></li>
                @if(!\Auth::check())
                <li class="{{ $navbar['login'] }}"><a href="{{ url('/login') }}">{{ __('log in') }}</a></li>
                <li class="{{ $navbar['register'] }}"><a href="{{ url('/register') }}">{{ __('register') }}</a></li>
                @else
                <li class="dropdown {{ $navbar['admin'] }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->username }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @if (Auth::user()->user_type_id <= 2)
                            <li class="{{ $navbar['card_types'] }}"><a href="{{ url('/card_types') }}">{{ __('tests types') }}</a></li>
                            <li class="{{ $navbar['cards'] }}"><a href="{{ url('/cards') }}">{{ __('tests') }}</a></li>
                            <li class="{{ $navbar['fields'] }}"><a href="{{ url('/fields') }}">{{ __('fields') }}</a></li>
                            <li class="{{ $navbar['grades'] }}"><a href="{{ url('/grades') }}">{{ __('grades') }}</a></li>
                            <li class="{{ $navbar['subjects'] }}"><a href="{{ url('/subjects') }}">{{ __('subjects') }}</a></li>
                            <li class="{{ $navbar['chapters'] }}"><a href="{{ url('/chapters') }}">{{ __('chapters') }}</a></li>
                        @endif
                        <li><a href="#" onclick="$('#logout_form').submit()">{{ __('log out') }}</a></li>
                        @if (Auth::user()->user_type_id == 1)
                            <li role="separator" class="divider"></li>
                            <li class="{{ $navbar['users'] }}"><a href="{{ url('/users') }}">{{ __('users') }}</a></li>
                            <li class="{{ $navbar['questions'] }}"><a href="{{ url('/questions') }}">{{ __('questions') }}</a></li>
                            <li class="{{ $navbar['exercises'] }}"><a href="{{ url('/exercises') }}">{{ __('exercises') }}</a></li>
                            <li><a href="{{ url('/') }}">{{ __('profile') }}</a></li>
                            <li><a href="{{ url('/') }}">{{ __('comments') }}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                <li class="dropdown lang-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img src="/img/flags/{{ $locale_lang }}.gif" alt="{{ $locale_lang }}" class="img-thumbnail icon-small"> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
        			    <li><a href="/setlocale/fr"><img src="/img/flags/fr.gif" alt="fr" class="img-thumbnail icon-small"></a></li>
        			    <li><a href="/setlocale/en"><img src="/img/flags/en.gif" alt="en" class="img-thumbnail icon-small"></a></li>
        	        </ul>
                </li>
                <li>
                    <form action="/search" method="get">
                        <input type="text" name="search" placeholder="{{ __('Search') }}.." id="input_search">
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<form id="logout_form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
<form style="display: none;" action="/search" method="get" id="quick_search_form">
    <input type="text" name="card_type" id="type_value">
    <input type="text" name="search" id="search_value">
</form>
