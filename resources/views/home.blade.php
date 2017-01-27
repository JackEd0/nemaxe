<?php
/**
 * Created by PhpStorm.
 * User: Edouard Home
 * Date: 26/01/2017
 * Time: 13:50
 */
$subbar = 'Home';
?>
@extends('layouts.master')
@section('title')
    Accueil
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            You are logged in!
        </div>

    </div>
@endsection
