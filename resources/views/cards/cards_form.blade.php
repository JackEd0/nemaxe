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
    <form class="form-group" action="{{ isset($id) ? url('/cards/'. $id ) : url('/cards') }}" method="post" >
        {{ csrf_field() }}
        @if(isset($id)) {{ method_field('PUT') }} @endif
        <h2>{{ __('Properties') }}</h2>

        <div class="form-group">
            <label for="card_type_id" class="col-md-4 control-label">Type</label>
            <select class="form-control" name="card_type_id" id="card_type_id">
                @foreach ($card_types as $card_type)
                <option value="{{ $card_type->id }}"
                    {{ isset($id) ? ( $card_type->id === $card->card_type_id ? ' selected' : '' ) : '' }} >
                        {{ $card_type->name }}
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

        @if (isset($id))
            <div class="form-group">
                <label for="chapter_id" class="col-md-4 control-label">{{ __('chapters') }}</label>
                <select class="form-control" name="subject_id" id="subject_id">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ ($subject->id === $card->subject_id) ? ' selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        @else
            <div class="form-group">
                <label for="chapter_id" class="col-md-4 control-label">{{ __('chapters') }}</label>
                <select class="form-control" name="chapter_id[]" id="chapter_id">
                    @foreach ($chapters as $chapter)
                        <option value="{{ $chapter->id }}" >{{ $chapter->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        @if (isset($id))
            <div class="form-group">
                <label for="status" class="col-md-4 control-label">Statut</label>
                <select class="form-control" name="status" id="status">
                    @foreach ($status as $key => $value)
                        <option value="{{ $key }}" {{ ($key === $card->status) ? ' selected' : '' }} >
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="form-group">
            <label for="status" class="col-md-4 control-label">{{ __('Duration') }}</label>
            <input type="text" name="duration" value="{{ (isset($id)) ? $card->duration : '01:00' }}">
        </div>

        <div class="form-group mmt">
            <label for="year" class="col-md-4 control-label">Annee</label>
            <select class="form-control" name="year" id="year">
                @foreach ($years as $year)
                    <option value="{{ $year }}"
                        {{ isset($id) ? ( $year === $card->year ? ' selected' : '' ) : '' }} >
                            {{ $year }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-12 margin-t-30">
            <div class="col-lg-3">
                <button type="submit" class="btn btn-primary" name="btn_publish">{{ __('Publish') }}</button>
                <button type="submit" class="btn btn-secondary" name="btn_save">{{ __('Save') }}</button>
            </div>
        </div>


    </form>


@endsection
