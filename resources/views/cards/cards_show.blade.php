<?php

$subbar = 'cards';
?>
@extends('layouts.master')
@section('title')
    Fiches
@stop

@section('blue-wrap')
    Visualiser une fiche
@stop

@section('content')
    <h3 class="ctitle text-capitalize">#{{ $card->id }} {{ $card->title }}</h3>
    @foreach ($exercises as $exercise)
        <p><strong>{{ $exercise->title }}</strong></p>
        <p class="text-justify">{!! $exercise->content !!}</p>
        <br />
    @endforeach
    <p>
        <csmall>Posted: {{ $card->created_at }}.</csmall>
        |
        <csmall2>By: {{ $card->user_username . ' - ' . $comments_number }} Comments</csmall2>
        |
        <csmall><a href="#">{{ $card->card_type_name }}</a></csmall>
    </p>
    <div class="spacing"></div>
    <h6>SHARE:</h6>
    <p class="share">
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-tumblr"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
    </p>
@endsection
