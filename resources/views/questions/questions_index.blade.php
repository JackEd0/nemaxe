<?php
/**
 * Date: 23/02/2017
 */

$subbar = 'questions';
?>

@extends('layouts.master')

@section('title') Questions @stop

@section('content')
<div class="content mb">
    <h1 class="h1-xs">Ajouter une nouvelle question</h1>
    <br/>
    <div class="row">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_question">
        <div class="col-sm-6">
            <textarea class="form-control" id="description" rows="4" cols="80" placeholder="Description"></textarea>
        </div>
        <div class="col-sm-3">
            <button type="button" class="btn btn-primary" id="submit">
                Ajouter
            </button>
        </div>
    </div>
</div>
<hr/>
<div class="content">
    <h1 class="mmb">Questions</h1>
    <div id="div_edit_question"></div>

    <table class="table table-striped table-bordered table-hover" id="question_table" >
        <thead>
        <tr>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($questions as $question)
            <tr id="tr_{{ $question->id}}">
                <td id="description_{{ $question->id}}">{{ $question->description }}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-default" title="Sauvegarder" data-id="{{ $question->id }}">
                            <span class="glyphicon glyphicon-floppy-disk"></span></a>
                        <a class="btn btn-default" title="Supprimer" data-id="{{ $question->id }}">
                            <span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="/js/views/questions.js" ></script>
@stop
