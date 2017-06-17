<?php
/**
 * Created by PhpStorm.
 * User: Edouard Home
 * Date: 26/01/2017
 * Time: 13:50
 */
?>
@extends('layouts.master')
@section('title')
    Accueil
@stop

@section('blue-wrap')
    Search - Find - Enjoy
@stop

@section('content')
    <div class="row">

    </div>
    <div class="row">
        <div class="col-lg-6">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="sr-only">Username</label>
                    <input id="username" type="text" class="form-control" name="username"
                        value="{{ old('username') }}" required autofocus placeholder="username">

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required
                        placeholder="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Login
                    </button>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <a class="btn btn-link" href="{{ url('/register') }}">
                            Register
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-lg-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                 deserunt mollit anim id est laborum.</p>
        </div>
    </div>
@endsection
