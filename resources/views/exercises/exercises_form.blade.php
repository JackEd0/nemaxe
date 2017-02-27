<?php
/**
 * Created by PhpStorm.
 * User: Edouard Home
 * Date: 31/01/2017
 * Time: 19:20
 */
$subbar = 'Cards';
?>
@extends('layouts.master')
@section('title')
    Enonces
@stop

@section('blue-wrap')
    Enonces - Create - Edit
@stop

@section('content')
    <form class="form-group"
        @if(isset($id)) action="{{ url('/exercises/'. $id ) }}"
        @else action="{{ url('/exercises') }}"
        @endif method="post" >
        {{ csrf_field() }}
        @if(isset($id))
            {{ method_field('PUT') }}
            <h3>Enonce #{{ $exercise->id }}</h3>
        @endif
        <div class="form-group mmt">
            <label for="title" class="col-md-4 control-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control"
            @if (isset($id))
                value="{{ $exercise->title }}" autofocus="" required=""
            @endif
            />
        </div>

        <div class="form-group">
            <label for="content" class="col-md-4 control-label">Contenu</label>
            <textarea name="content" id="content" rows="8" cols="80" class="form-control"
                >@if(isset($id)) {!! $exercise->content !!} @endif</textarea>
        </div>

        <div class="form-group">
            <label for="subject_id" class="col-md-4 control-label">Matiere</label>
            <select class="form-control" name="subject_id" id="subject_id">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}"
                        @if(isset($id))
                            @if ($subject->id == $exercise->subject_id)
                                selected=""
                            @endif
                        @endif
                        >{{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="grade_id" class="col-md-4 control-label">Classe</label>
            <select class="form-control" name="grade_id" id="grade_id">
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}"
                        @if(isset($id))
                            @if ($grade->id == $exercise->grade_id)
                                selected=""
                            @endif
                        @endif
                        >{{ $grade->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="condurationtent" class="col-md-4 control-label">Duree</label>
            <select class="form-control" name="duration" id="duration">
                @foreach ($durations as $key => $value)
                    <option value="{{ $key }}"
                        @if(isset($id))
                            @if ($key == $exercise->duration)
                                selected=""
                            @endif
                        @endif
                        >{{ $value }} min
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status" class="col-md-4 control-label">Statut</label>
            <select class="form-control" name="status" id="status">
                @foreach ($status as $key => $value)
                    <option value="{{ $key }}"
                        @if(isset($id))
                            @if ($key == $exercise->status)
                                selected=""
                            @endif
                        @endif
                        >{{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>
@endsection
