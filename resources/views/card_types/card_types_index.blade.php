<?php
/**
 * Date: 23/02/2017
 */

$subbar = 'card_types';
?>

@extends('layouts.master')

@section('title')
    Classes
@stop

@section('content')
    <div class="content mb">
        <h1 class="h1-xs">Ajouter une nouvelle classe</h1>
        <br/>
        <div >
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_card_type">
            <div class="col-sm-3">
                <input type="text" class="form-control" placeholder="Nom"
                       autofocus="" id="name">
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary" onclick="store_card_type()">
                    Ajouter
                </button>
            </div>
        </div>
    </div>
    <hr/>
    <div class="content">
        <h1 class="mmb">Series</h1>
        <div id="div_edit_card_type"></div>

        <table class="table table-striped table-bordered table-hover" id="card_type_table" >
            <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($card_types as $card_type)
                <tr id="tr_{{ $card_type->id}}">
                    <td id="name_{{ $card_type->id}}">{{ $card_type->name }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default" title="Sauvegarder"
                            onclick="edit_card_type({{ $card_type->id }})">
                                <span class="glyphicon glyphicon-floppy-disk"></span></a>
                            <a class="btn btn-default" title="Supprimer" onclick="delete_card_type({{ $card_type->id}})">
                                <span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/views/card_types.js" ></script>
@stop
