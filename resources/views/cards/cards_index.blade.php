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
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_card">
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ url('/cards/create') }}">Ajouter</a>
                </div>
            </div>
            <hr/>
        @endif
    @endif
    <table class="table table-striped table-hover" id="card_table">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 60%;">Title</th>
                <th>Year</th>
                <th>Created at</th>
                @if (Auth::check())
                    @if (Auth::user()->user_type < 3)
                        <th>Actions</th>
                    @endif
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($cards as $card)
                <tr id="tr_{{ $card->id}}">
                    <td>{{ $card->id }}</td>
                    <td>
                        <a href="{{ url('/epreuves/' . $card->id) }}">{{ "{$card->card_type_name} {$card->grade_short_name} {$card->field_name}" }}</a>
                        <p class="text-justify">{!! substr($card->exercise_content, 0, 150) !!} ...</p>
                    </td>
                    <td>{{ $card->year }}</td>
                    <td>{{ substr($card->created_at, 0, 10) }}</td>
                    @if (Auth::check())
                        @if (Auth::user()->user_type < 3)
                            <td>
                                <span class="btn-group">
                                    <a class="btn btn-secondary" href="{{ url('/cards/' . $card->id . '/edit') }}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <button class="btn btn-secondary" type="button" onclick="delete_card('{{ $card->id }}')">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </span>
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="/js/views/cards.js" ></script>
@endsection
