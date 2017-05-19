<?php
$navbar = [
    'home' => '', 'chapters' => '', 'fields' => '', 'grades' => '', 'card_types' => '',
    'subjects' => '', 'login' => '', 'register' => '', 'admin' => '', 'profil' => '',
    'comments' => '', 'cards' => '', 'users' => '', 'exercises' => '', 'questions' => '',
];
if (isset($subbar)) {
    $navbar[$subbar] = 'active';
}
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
                <li class="{{ $navbar['cards'] }}"><a href="{{ url('/epreuves') }}">EPREUVES</a></li>
                @if(!\Auth::check())
                <li class="{{ $navbar['login'] }}"><a href="{{ url('/login') }}">LOGIN</a></li>
                <li class="{{ $navbar['register'] }}"><a href="{{ url('/register') }}">REGISTER</a></li>
                @else
                <li class="dropdown {{ $navbar['admin'] }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->username }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="{{ $navbar['exercises'] }}"><a href="{{ url('/exercises') }}">ENONCES</a></li>
                        <li class="{{ $navbar['cards'] }}"><a href="{{ url('/cards') }}">EPREUVES</a></li>
                        <li class="{{ $navbar['users'] }}"><a href="{{ url('/users') }}">UTILISATEURS</a></li>
                        <li class="{{ $navbar['chapters'] }}"><a href="{{ url('/chapters') }}">CHAPTERS</a></li>
                        <li class="{{ $navbar['fields'] }}"><a href="{{ url('/fields') }}">SERIES</a></li>
                        <li class="{{ $navbar['grades'] }}"><a href="{{ url('/grades') }}">CLASSES</a></li>
                        <li class="{{ $navbar['subjects'] }}"><a href="{{ url('/subjects') }}">MATIERES</a></li>
                        <li class="{{ $navbar['card_types'] }}"><a href="{{ url('/card_types') }}">TYPES</a></li>
                        <li class="{{ $navbar['questions'] }}"><a href="{{ url('/questions') }}">Questions</a></li>
                        <li><a href="{{ url('/logout') }}">DECONNEXION</a></li>
                        @if (Auth::user()->user_type_id == 1)
                            <li><a href="{{ url('/') }}">PROFIL</a></li>
                            <li><a href="{{ url('/') }}">COMMENTS</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                <li>
                    <form>
                        <input type="text" name="search" placeholder="Search.." id="input_search">
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
