<?php
/**
 * Date: 23/02/2017
 */

$subbar = 'grades';
?>

@extends('layouts.admin')

@section('title')
    Classes
@stop

@section('content')
    <div class="content mb">
        <h1 class="h1-xs">Ajouter une nouvelle classe</h1>
        <br/>
        <div >
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_grade">
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Nom"
                       autofocus="" id="name">
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary" onclick="store_grade()">
                    Ajouter
                </button>
            </div>
        </div>
    </div>
    <hr/>
    <div class="content">
        <h1 class="mmb">Series</h1>
        <div id="div_edit_grade"></div>

        <table class="table table-striped table-bordered table-hover" id="grade_table" >
            <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($grades as $grade)
                <tr id="tr_{{ $grade->id}}">
                    <td id="name_{{ $grade->id}}">{{ $grade->name }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default" title="Sauvegarder"
                            onclick="edit_grade({{ $grade->id }})">
                                <span class="glyphicon glyphicon-floppy-disk"></span></a>
                            <a class="btn btn-default" title="Supprimer" onclick="delete_grade({{ $grade->id}})">
                                <span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/views/grades.js" ></script>
@stop
