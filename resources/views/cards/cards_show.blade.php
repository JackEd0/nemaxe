<?php

$subbar = 'Cards';
?>
@extends('layouts.master')
@section('title')
    Fiches
@stop

@section('blue-wrap')
    Visualiser une fiche
@stop

@section('content')
    <h3 class="ctitle text-capitalize">{{ $card->nature . ' #' . $card->number }}</h3>
    <p><img class="img-responsive" src="/img/{{ $card->category . '/' . $card->content }}"></p>
    <h3 class="">{{ $card->title }}.</h3>
    <p>
        <csmall>Posted: April 25, 2014.</csmall>
        |
        <csmall2>By: {{ $card->author . ' - ' . $comments_number }} Comments</csmall2>
        |
        <csmall><a href="#">{{ $card->category }}</a></csmall>
    </p>
    @if ($card->twin_id != null)
        @if ($card->nature == 'exercise')
            <a href="#">See solution</i></a>
        @else
            <a href="#">See enoncee</i></a>
        @endif
    @endif
    <div class="spacing"></div>
    <h6>SHARE:</h6>
    <p class="share">
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-tumblr"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
    </p>
@endsection
