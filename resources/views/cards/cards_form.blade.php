<?php
/**
 * Created by PhpStorm.
 * User: Edouard Home
 * Date: 31/01/2017
 * Time: 19:20
 */
$subbar = 'Cards';
?>
@extends('layouts.master')
@section('title')
    Fiches
@stop

@section('blue-wrap')
    Fiches - Create - Edit
@stop

@section('content')
    <form class="" action="@if(isset($id)) {{ url('/cards/'. $id ) }}
    @else {{ url('/cards') }} @endif" method="post">
        {{ csrf_field() }}
        @if(isset($id)) {{ method_field('PUT') }} @endif
        <select class="" name="card_nature">
            <option value="exercise">Exercise</option>
            <option value="solution">Solution</option>
        </select>
        <input type="text" name="card_number"
        @if (isset($id))
            {{ ' value="' . $card->number . '" disabled' }}
        @else
            {{ ' value="' . $card_number . '"' }}
        @endif
        />
        <select class="" name="card_type_id">
            @if (isset($id))
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                    @if ($card->card_type_id == $category->id)
                        {{ ' checked'}}
                    @endif
                    >{{ $category->name }}</option>
                @endforeach
            @else
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            @endif
        </select>
        <input type="text" name="card_title"
        @if (isset($id))
            {{ ' value="' . $card->title . '"' }}
        @endif
        >
        <input type="text" name="card_content"
        @if (isset($id))
            {{ ' value="' . $card->content . '"' }}
        @endif
        >
        <select class="" name="twin_id">
            @if (isset($id))
                @foreach ($cards as $card_item)
                    <option value="{{ $card_item->id }}"
                    @if ($card->twin_id == $card_item->id)
                        {{ ' checked'}}
                    @endif
                    >{{ $card_item->number }}</option>
                @endforeach
            @else
                @foreach ($cards as $card_item)
                    <option value="{{ $card_item->id }}">{{ $card_item->number }}</option>
                @endforeach
            @endif
        </select>
    </form>


@endsection
