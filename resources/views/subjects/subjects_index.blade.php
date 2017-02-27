<?php
/**
 * Date: 23/02/2017
 */

$subbar = 'subjects';
?>

@extends('layouts.admin')

@section('title')
    Matieres
@stop

@section('content')
    <div class="content mb">
        <h1 class="h1-xs">Ajouter une nouvelle matiere</h1>
        <br/>
        <div >
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_subject">
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Nom"
                       autofocus="" id="name">
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary" onclick="store_subject()">
                    Ajouter
                </button>
            </div>
        </div>
    </div>
    <hr/>
    <div class="content">
        <h1 class="mmb">Series</h1>
        <div id="div_edit_subject"></div>

        <table class="table table-striped table-bordered table-hover" id="subject_table" >
            <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($subjects as $subject)
                <tr id="tr_{{ $subject->id}}">
                    <td id="name_{{ $subject->id}}">{{ $subject->name }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default" title="Sauvegarder"
                            onclick="edit_subject({{ $subject->id }})">
                                <span class="glyphicon glyphicon-floppy-disk"></span></a>
                            <a class="btn btn-default" title="Supprimer" onclick="delete_subject({{ $subject->id}})">
                                <span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/views/subjects.js" ></script>
@stop
