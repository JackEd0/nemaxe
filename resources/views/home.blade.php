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

@section('blue-wrap')
    Search - Find - Enjoy
@stop

@section('content')
    @foreach($cards as $i => $card)
        <div class="col-lg-6">
            <h3 class="ctitle text-capitalize">{{ $card->nature . ' #' . $card->number }}</h3>
            <p><a href="{{ url('/epreuves/' . $card->id) }}">
                <img class="img-responsive" src="/img/{{ $card->category }}/{{ $card->content }}">
            </a></p>
            <a href="{{ url('/epreuves/' . $card->id) }}"><h3 class="">{{ $card->title }}.</h3></a>
            <p>
                <csmall>Posted: April 25, 2014.</csmall>
                |
                <csmall2>{{ $comments_number[$i] }} Comments</csmall2>
                |
                <csmall><a href="#">{{ $card->category }}</a></csmall>
            </p>
            <p><a href="{{ url('/epreuves/' . $card->id) }}">[Read More]</a></p>
            <div class="hline"></div>
        </div>
    @endforeach
@endsection
