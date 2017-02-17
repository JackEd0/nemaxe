<?php
$subbar = 'Cards';
?>
@extends('layouts.master')
@section('title')
    Fiches
@stop

@section('blue-wrap')
    Fiches - List
@stop

@section('content')
    <div class="row">
        <h1 class="h1-xs">Ajouter une nouvelle fiche</h1>
        <br/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_field">
        <div class="col-sm-3">
            <a class="btn btn-primary" href="{{ url('/cards/create') }}">Ajouter</a>
        </div>
    </div>
    <hr/>
    <div class="content">
        @foreach($cards as $i => $card)
            <div class="col-lg-6" id="div_cards_{{ $card->id }}">
                <h3 class="ctitle text-capitalize">{{ $card->nature . ' #' . $card->number }}</h3>
                <p><a href="{{ url('/cards/' . $card->id) }}">
                    <img class="img-responsive" src="/img/{{ $card->category }}/{{ $card->content }}">
                </a></p>
                <a href="{{ url('/cards/' . $card->id) }}"><h3 class="">{{ $card->title }}.</h3></a>
                <p>
                    <csmall>Posted: April 25, 2014.</csmall>
                    |
                    <csmall2>By: {{ $card->author . ' - ' . $comments_number[$i] }} Comments</csmall2>
                    |
                    <csmall><a href="#">{{ $card->category }}</a></csmall>
                </p>
                <span class="btn-group mmb">
                    <a class="btn btn-secondary" href="{{ url('/cards/' . $card->id . '/edit') }}">
                        <span class="glyphicon glyphicon-pencil"></span></a>
                    <button class="btn btn-secondary" type="button"
                            onclick="delete_card('{{ $card->id }}')">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                </span>
                <div class="hline"></div>
            </div>
        @endforeach
    </div>
@endsection
