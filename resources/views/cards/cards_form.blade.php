<?php
/**
 * Created by PhpStorm.
 * User: Edouard Home
 * Date: 31/01/2017
 * Time: 19:20
 */
$subbar = 'cards';
?>
@extends('layouts.master')
@section('title')
    Fiches
@stop

@section('blue-wrap')
    Fiches - Create - Edit
@stop

@section('content')
    <form class="form-group"
        @if(isset($id)) action="{{ url('/cards/'. $id ) }}"
        @else action="{{ url('/cards') }}"
        @endif method="post" >
        {{ csrf_field() }}
        @if(isset($id)) {{ method_field('PUT') }} @endif

        <div class="form-group mmt">
            <label for="title" class="col-md-4 control-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control"
            @if (isset($id))
                value="{{ $card->title }}" autofocus="" required=""
            @endif
            />
        </div>

        <div class="form-group mmt">
            <label for="year" class="col-md-4 control-label">Annee</label>
            <input type="text" name="year" id="year" class="form-control" placeholder="2017-01-01"
            @if (isset($id))
                value="{{ $card->year }}" required=""
            @endif
            />
        </div>

        <div class="form-group">
            <label for="card_type_id" class="col-md-4 control-label">Type</label>
            <select class="form-control" name="card_type_id" id="card_type_id">
                @foreach ($card_types as $card_type)
                    <option value="{{ $card_type->id }}"
                        @if(isset($id))
                            @if ($card_type->id == $card->card_type_id)
                                selected=""
                            @endif
                        @endif
                        >{{ $card_type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject_id" class="col-md-4 control-label">Matiere</label>
            <select class="form-control" name="subject_id" id="subject_id">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}"
                        @if(isset($id))
                            @if ($subject->id == $card->subject_id)
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
                            @if ($grade->id == $card->grade_id)
                                selected=""
                            @endif
                        @endif
                        >{{ $grade->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="field_id" class="col-md-4 control-label">Serie</label>
            <select class="form-control" name="field_id" id="field_id">
                @foreach ($fields as $field)
                    <option value="{{ $field->id }}"
                        @if(isset($id))
                            @if ($field->id == $card->field_id)
                                selected=""
                            @endif
                        @endif
                        >{{ $field->name }}
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
                            @if ($key == $card->status)
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
