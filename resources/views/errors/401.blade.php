@extends('layouts.error')
@section('title')
    Erreur 401
@stop
@section('content')
    <div class="well text-center mmtb">
        <div class="alert alert-danger" role="alert">
            <h3><b>Erreur 401 : Accès non autorisé</b></h3>
            Put your hands up and drop your weapons.
        </div>
        <div class="alert alert-info alert-dismissable" role="alert">
            Si vous pensez avoir les droits nécessaire mais que le problème persiste veuillez contacter l'administrateur de cette plateforme.
        </div>
        <a href="{{ url('/') }}"><strong>Retour à l'accueil</strong></a>
    </div>
@stop
