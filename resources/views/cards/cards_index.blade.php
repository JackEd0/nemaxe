<?php
$subbar = 'cards';
?>
@extends('layouts.master')
@section('title')
    Fiches
@stop

@section('blue-wrap')
    Fiches - List
@stop

@section('content')
    @if (Auth::check())
        @if (Auth::user()->user_type < 3)
            <div class="content mb">
                <h1 class="h1-xs">Ajouter une nouvelle fiche</h1>
                <br/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_field">
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ url('/cards/create') }}">Ajouter</a>
                </div>
            </div>
            <hr/>
        @endif
    @endif
    <div class="content">
        @foreach($cards as $i => $card)
            <div class="col-lg-6" id="div_cards_{{ $card->id }}">
                <h3 class="ctitle text-capitalize">
                    <a href="{{ url('/epreuves/' . $card->id) }}">
                        {{ "#{$card->id} {$card->card_type_name} {$card->grade_short_name} {$card->field_name} " }}
                    </a>
                </h3>
                <p><strong>{{ __("Part") . '1' }}</strong></p>
                <p class="text-justify">{!! $parts[$card->id]['exercise'] !!}</p>
                <p class="text-justify">
                    <strong>Questions</strong><br />
                    <ol style="margin-left:5%;">
                        @foreach ($parts[$card->id]['questions'] as $question)
                            <li>{{ $question }}</li>
                        @endforeach
                    </ol>
                </p>
                <p>
                    <csmall>Posted: {{ $card->created_at }}</csmall>
                    |
                    <csmall2>{{ $comments_number[$i] }} Comments</csmall2>
                    |
                    <csmall><a href="#">{{ $card->card_type_name }}</a></csmall>
                </p>
                @if (Auth::check())
                    @if (Auth::user()->user_type < 3)
                        <span class="btn-group mmb">
                            <a class="btn btn-secondary" href="{{ url('/cards/' . $card->id . '/edit') }}">
                                <span class="glyphicon glyphicon-pencil"></span></a>
                            <button class="btn btn-secondary" type="button"
                                    onclick="delete_card('{{ $card->id }}')">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </span>
                    @endif
                @endif
                <div class="hline"></div>
            </div>
        @endforeach
    </div>
@endsection
