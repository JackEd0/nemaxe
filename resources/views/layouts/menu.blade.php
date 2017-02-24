<?php
/**
 * Created by PhpStorm.
 * User: ploggmedia
 * Date: 2017-01-26
 * Time: 8:45 AM
 */
$navbar = ['Home' => '', 'chapters' => '', 'Experiences' => '', 'Realisations' => '',
        'About' => '', 'Login' => '', 'Register' => '', 'Admin' => '', 'Profil' => '',
        'Comments' => '', 'Cards' => '', 'Users' => ''];
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
                <li class="{{ $navbar['Home'] }}"><a href="{{ url('/') }}">HOME</a></li>
                @if(!Auth::check())
                <li class="{{ $navbar['Login'] }}"><a href="{{ url('/login') }}">LOGIN</a></li>
                <li class="{{ $navbar['Register'] }}"><a href="{{ url('/register') }}">REGISTER</a></li>
                @else
                <li class="dropdown {{ $navbar['Admin'] }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->username }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/') }}">PROFIL</a></li>
                        <li><a href="{{ url('/cards') }}">POSTS</a></li>
                        <li><a href="{{ url('/') }}">COMMENTS</a></li>
                        <li><a href="{{ url('/chapters') }}">CHAPTERS</a></li>
                        <li><a href="{{ url('/logout') }}">DISCONNECT</a></li>
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
