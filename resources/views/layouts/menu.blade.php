<?php
/**
 * Created by PhpStorm.
 * User: ploggmedia
 * Date: 2017-01-26
 * Time: 8:45 AM
 */
$navbar = array('Home' => '', 'Skills' => '', 'Experiences' => '', 'Realisations' => '',
        'About' => '', 'Login' => '', 'Register' => '', 'Admin' => '', 'Profil' => '',
        'Comments' => '', 'Cards' => '', 'Users' => '');
if (isset($subbar)) {
    $navbar[$subbar] = 'active';
}
?>
<style>
    #input_search {
        width: 30px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 30px;
        font-size: 16px;
        background-color: white;
        background-image: url('/img/searchicon.png');
        background-position: 5px 3px;
        background-repeat: no-repeat;
        padding: 1px 20px 1px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
        margin-top: 10px;
        margin-left: 5px;
    }

    #input_search:focus {
        width: 100%;
    }
</style>
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
                <li class="{{ $navbar['Login'] }}"><a href="{{ url('/') }}">LOGIN</a></li>
                <li class="{{ $navbar['Register'] }}"><a href="{{ url('/') }}">REGISTER</a></li>
                @else
                <li class="dropdown {{ $navbar['Admin'] }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">JOHN DOE<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/') }}">PROFIL</a></li>
                        <li><a href="{{ url('/') }}">POSTS</a></li>
                        <li><a href="{{ url('/') }}">COMMENTS</a></li>
                        <li><a href="{{ url('/') }}">DISCONNECT</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <form>
                        <input type="text" name="search" placeholder="Search.." id="input_search">
                    </form>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
