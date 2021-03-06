<?php
/**
* Created by PhpStorm.
* User: Edouard Home
* Date: 26/01/2017
* Time: 13:50
*/
?>
@extends('layouts.admin')
@section('title')
    {{ __('Home') }}
@stop

@section('content')
    <div class="row">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="img/banners/banner-1.jpg" alt="Banner">
                </div>
                <div class="item">
                    <img src="img/banners/banner-2.jpg" alt="Banner">
                </div>
                <div class="item">
                    <img src="img/banners/banner-3.jpg" alt="Banner">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only text-capitalize">{{ __('previous') }}</span>
            </a>
            <a class="right carousel-control" href="#carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only text-capitalize">{{ __('next') }}</span>
            </a>
        </div>
    </div>
    <div class="row mt">
        <div class="col-md-6">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" id="home_form">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="sr-only text-capitalize">{{ __('username') }}</label>
                    <input id="username" type="text" name="username"
                    value="{{ old('username') }}" required placeholder="{{ __('username') }}">

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="sr-only text-capitalize">{{ __('password') }}</label>
                    <input id="password" type="password" name="password" required
                    placeholder="{{ __('password') }}">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('log in') }}
                    </button>
                </div>
                <div class="form-group text-center">
                    <a class="btn btn-link text-capitalize" href="{{ url('/register') }}">
                        {{ __('register') }}
                    </a>
                    |
                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                        {{ __('Forgot your password') }} ?
                    </a>
                </div>

            </form>
        </div>
        <div class="col-md-6">
            <h2 id="home_description" class=" text-capitalize">{{ __('description') }}</h2>
            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    @endsection
