<?php
/**
 * Date: 26/02/2017
 */

$subbar = 'users';
?>

@extends('layouts.admin')

@section('title')
    Utilisateurs
@stop

@section('content')
    <div class="content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_field">
        <input type="hidden" id="hidden_user_types" value='<?php echo json_encode($user_types) ?>'>
        <h1 class="mmb">Liste des utilisateurs</h1>
        <div id="div_edit_user"></div>

        <table class="table table-striped table-bordered table-hover" id="user_table" >
            <thead>
            <tr>
                <th>Nom D'utilisateur</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr id="tr_{{ $user->id}}">
                    <td id="name_{{ $user->id}}">{{ $user->username }}</td>
                    <td id="user_type_name_{{ $user->id}}">{{ $user->user_type_name }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default" title="Sauvegarder"
                            onclick="edit_user({{ $user->id }}, {{ $user->user_type_id }})">
                                <span class="glyphicon glyphicon-floppy-disk"></span></a>
                            <a class="btn btn-default" title="Supprimer" onclick="delete_user({{ $user->id}})">
                                <span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="/js/views/users.js" ></script>
@stop
