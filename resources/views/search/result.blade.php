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
        <form action="/search" method="post">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="trygonometrie, appareil respiratoie"
                value="{{ isset($_POST['search']) ? $_POST['search'] : '' }}">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>
            </div>
            <div class="col-md-12">
                <a href="#" class="pull-right" data-toggle="collapse" data-target="#filter_panel">Advanced search</a>
            </div>
            <div id="filter_panel" class="collapse">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="pref-perpage">Type</label>
                            <select id="pref-perpage" class="form-control">
                                <option value="2">2</option>
                                <option value="1000">1000</option>
                            </select>
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
                    <th>#</th>
                    <th style="width: 70%;">Title</th>
                    <th>Year</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cards as $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>
                            <a href="{{ url('/epreuves/' . $card->id) }}">{{ "{$card->card_type_name} {$card->grade_short_name} {$card->field_name}" }}</a>
                            {{-- <p class="text-justify">{!! substr($parts[$card->id]['exercise'], 0, 150) !!} ...</p> --}}
                            <p class="text-justify">{!! substr($card->exercise_content, 0, 150) !!} ...</p>
                        </td>
                        <td>{{ $card->year }}</td>
                        <td>{{ $card->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/views/result.js" ></script>
@endsection
