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
        <h2>Fiches</h2>
        @foreach($cards as $i => $card)
            <div class="col-lg-4 panel-default" id="div_cards_{{ $card->id }}">
                <div class="panel-heading">{{ $card->nature . ' #' . $card->number }}</div>
                <div class="panel-body">
                    <h3 class="ctitle">{{ $card->title }}.</h3>
                    <p><img class="img-responsive" src="/img/{{ $card->category . '/' . $card->content }}"></p>
                    <p>
                        <csmall>Posted: April 25, 2014.</csmall>
                        |
                        <csmall2>By: {{ $card->author . ' - ' . $comments_number[$i] }} Comments</csmall2>
                    </p>
                </div>
                <div class="panel-footer">
                    <span class="btn-group">
                        <a class="btn btn-secondary" href="{{ url('/cards/' . $card->id . '/edit') }}"><span
                                    class="glyphicon glyphicon-pencil"></span></a>
                        <button class="btn btn-secondary" type="button"
                                onclick="delete_card('{{ $card->id }}')">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
