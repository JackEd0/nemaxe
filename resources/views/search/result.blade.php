<?php
$subbar = 'search';
?>
@extends('layouts.master')
@section('title')
    Search
@stop

@section('blue-wrap')
    Search Result
@stop

@section('content')
    <div class="row">
        <form action="/search" method="get">
            <!-- {{ csrf_field() }} -->
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="trygonometrie, appareil respiratoie"
                value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
            <div class="col-md-12">
                <a href="#" class="pull-right" data-toggle="collapse" data-target="#filter_panel" id="link_advanced_search">Advanced search</a>
            </div>
            <div id="filter_panel" class="collapse {{ isset($_GET['advanced_search']) ? ' in' : '' }}">
                <input type="hidden" name="advanced_search" value="{{ isset($_GET['advanced_search']) ? $_GET['advanced_search'] : '' }}" id="advanced_search">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="card_type">Type</label>
                                <select name="card_type" class="form-control" id="card_type">
                                    @foreach ($card_types as $card_type)
                                        <option value="{{ $card_type->id }}" {{ (isset($_GET['card_type']) && $_GET['card_type'] == $card_type->id) ? ' selected' : '' }}>
                                            {{ $card_type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="field">Field</label>
                                <select name="field" id="field" class="form-control">
                                    @foreach ($fields as $field)
                                        <option value="{{ $field->id }}" {{ (isset($_GET['field']) && $_GET['field'] == $field->id) ? ' selected' : '' }}>
                                            {{ $field->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="grade">Grade</label>
                                <select name="grade" id="grade" class="form-control">
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}" {{ (isset($_GET['grade']) && $_GET['grade'] == $grade->id) ? ' selected' : '' }}>
                                            {{ $grade->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row mmt">
        <table class="table table-striped table-hover" id="result_table">
            <thead>
                <tr>
                    <th class="hidden-xs">#</th>
                    <th style="width: 70%;">Title</th>
                    <th>Year</th>
                    <th class="hidden-xs">Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cards as $card)
                    <tr>
                        <td class="hidden-xs">{{ $card->id }}</td>
                        <td>
                            <a href="{{ url('/epreuves/' . $card->id) }}">{{ "{$card->card_type_name} {$card->grade_short_name} {$card->field_name}" }}</a>
                            {{-- <p class="text-justify">{!! substr($parts[$card->id]['exercise'], 0, 150) !!} ...</p> --}}
                            <p class="text-justify">{!! substr($card->exercise_content, 0, 150) !!} ...</p>
                        </td>
                        <td>{{ $card->year }}</td>
                        <td class="hidden-xs">{{ substr($card->created_at, 0, 10) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/views/result.js" ></script>
@endsection
