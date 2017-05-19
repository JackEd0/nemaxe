<?php
/**
 * Date: 23/02/2017
 */

$subbar = 'chapters';
?>

@extends('layouts.master')

@section('title')
    Chapitres
@stop

@section('content')
    <div class="content mb">
        <h1 class="h1-xs">Ajouter un nouveau chapitre</h1>
        <br/>
        <div >
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_field">
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Nom"
                       autofocus="" id="name">
            </div>
            <div class="col-sm-3">
                <select class="form-control" id="subject_id">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary" onclick="store_chapter()">
                    Ajouter
                </button>
            </div>
        </div>
    </div>
    <hr/>
    <div class="content">
        <input type="hidden" id="hidden_subjects" value='<?php echo json_encode($subjects) ?>'>
        <h1 class="mmb">Chapitres</h1>
        <div id="div_edit_chapter"></div>

        <table class="table table-striped table-bordered table-hover" id="chapter_table" >
            <thead>
            <tr>
                <th>Nom</th>
                <th>Matiere</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($chapters as $chapter)
                <tr id="tr_{{ $chapter->id}}">
                    <td id="name_{{ $chapter->id}}">{{ $chapter->name }}</td>
                    <td id="subject_name_{{ $chapter->id}}">{{ $chapter->subject_name }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default" title="Sauvegarder"
                            onclick="edit_chapter({{ $chapter->id }}, {{ $chapter->subject_id }})">
                                <span class="glyphicon glyphicon-floppy-disk"></span></a>
                            <a class="btn btn-default" title="Supprimer" onclick="delete_chapter({{ $chapter->id}})">
                                <span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/views/chapters.js" ></script>
@stop
