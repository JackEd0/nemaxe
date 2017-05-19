<?php
$subbar = 'exercises';
?>
@extends('layouts.master')
@section('title')
    Enonces
@stop

@section('blue-wrap')
    Enonces - List
@stop

@section('content')
    @if (Auth::check())
        @if (Auth::user()->user_type < 3)
            <div class="content mb">
                <h1 class="h1-xs">Ajouter une nouvelle enonce</h1>
                <br/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_field">
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ url('/exercises/create') }}">Ajouter</a>
                </div>
            </div>
            <hr/>
        @endif
    @endif
    <div class="content">
        @foreach($exercises as $i => $exercise)
            <div class="" id="div_exercises_{{ $exercise->id }}">
                <h3 class="ctitle text-capitalize">
                    <a href="{{ url('/exercises/' . $exercise->id) }}">
                        #{{ $exercise->id }}
                    </a>
                </h3>
                <p class="text-justify">{!! $exercise->content !!}</p>
                <p>
                    <csmall><a href="#">{{ $exercise->subject_name }}</a></csmall>
                </p>
                @if (Auth::check())
                    @if (Auth::user()->user_type < 3)
                        <span class="btn-group mmb">
                            <a class="btn btn-secondary" href="{{ url('/exercises/' . $exercise->id . '/edit') }}">
                                <span class="glyphicon glyphicon-pencil"></span></a>
                            <button class="btn btn-secondary" type="button"
                                    onclick="delete_exercise('{{ $exercise->id }}')">
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
