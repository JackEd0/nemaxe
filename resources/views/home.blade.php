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
    @foreach($cards as $i => $card)
        <div class="">
            <h3 class="ctitle text-capitalize">
                <a href="{{ url('/epreuves/' . $card->id) }}">{{ $card->title }}</a>
            </h3>
            <p class="text-justify">{!! $exercises[$i]->content !!}</p>
            <p>
                <csmall>Posted: {{ $card->created_at }}</csmall>
                |
                <csmall2>{{ $comments_number[$i] }} Comments</csmall2>
                |
                <csmall><a href="#">{{ $card->card_type_name }}</a></csmall>
            </p>
            <p><a href="{{ url('/epreuves/' . $card->id) }}">[Read More]</a></p>
            <div class="hline"></div>
        </div>
    @endforeach
@endsection
