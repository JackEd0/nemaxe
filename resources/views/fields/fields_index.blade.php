<?php
/**
 * Date: 23/02/2017
 */

$subbar = 'fields';
?>

@extends('layouts.admin')

@section('title')
    Series
@stop

@section('content')
    <div class="content mb">
        <h1 class="h1-xs">Ajouter une nouvelle serie</h1>
        <br/>
        <div >
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_field">
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Nom"
                       autofocus="" id="name">
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Description" id="description">
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary" onclick="store_field()">
                    Ajouter
                </button>
            </div>
        </div>
    </div>
    <hr/>
    <div class="content">
        <h1 class="mmb">Series</h1>
        <div id="div_edit_field"></div>

        <table class="table table-striped table-bordered table-hover" id="field_table" >
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($fields as $field)
                <tr id="tr_{{ $field->id}}">
                    <td id="name_{{ $field->id}}">{{ $field->name }}</td>
                    <td id="description_{{ $field->id}}">{{ $field->description }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default" title="Sauvegarder"
                            onclick="edit_field({{ $field->id }})">
                                <span class="glyphicon glyphicon-floppy-disk"></span></a>
                            <a class="btn btn-default" title="Supprimer" onclick="delete_field({{ $field->id}})">
                                <span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/views/fields.js" ></script>
@stop
