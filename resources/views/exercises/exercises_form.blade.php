<?php $subbar = 'Cards'; ?>
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
    </form>
@endsection
