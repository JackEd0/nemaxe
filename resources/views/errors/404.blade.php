<?php
/**
 * User: Jacques
 * Date: 26/02/2017
 */
?>

@extends('layouts.error')
@section('title')
    Erreur 404
@stop
@section('content')
    <div class="well text-center mmtb">
        <div class="alert alert-danger" role="alert">
            <h3><b>Erreur 404 : Page inexistante</b></h3>
            You fell into an internet hole
        </div>
        <div class="alert alert-info alert-dismissable" role="alert">
            Si vous pensez que cette page est censée exister veuillez contacter l'administrateur de cette plateforme.
        </div>
        <a href="{{ url('/') }}"><strong>Retour à l'accueil</strong></a>
    </div>
@stop
