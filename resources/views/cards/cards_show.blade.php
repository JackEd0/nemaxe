<?php $subbar = 'cards'; ?>
@extends('layouts.master')
@section('title')
    Fiches
@stop

@section('blue-wrap')
    Visualiser une fiche
@stop

@section('content')
    <h3 class="ctitle text-capitalize">#{{ $card->id }} {{ "{$card->card_type_name} {$card->grade_short_name} {$card->field_name}" }}</h3>
    @foreach ($exercises as $key => $exercise)
        <div class="mmb ws-question">
            <p><strong>Part {{ $key+1 }}</strong></p>
            <p class="text-justify">{!! $exercise->content !!}</p>
            <ol>
                @foreach ($questions[$exercise->id] as $question)
                    <li>{{ $question->description }}</li>
                @endforeach
            </ol>
        </div>
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
