<?php $subbar = 'cards'; ?>
@extends('layouts.master')
@section('title')
    Fiches
@stop

@section('blue-wrap')
    Fiches - Create - Edit
@stop

@section('content')
    <form class="form-horizontal" action="{{ isset($id) ? url('/cards/'. $id ) : url('/cards') }}" method="post" >
        {{ csrf_field() }}
        @if(isset($id)) {{ method_field('PUT') }} @endif
            <h2>{{ __('Properties') }}</h2>

            <div class="form-group">
                <label for="card_type_id" class="col-md-4 control-label">Type</label>
                <div class="col-md-4">
                    <select class="form-control" name="card_type_id" id="card_type_id">
                        @foreach ($card_types as $card_type)
                            <option value="{{ $card_type->id }}" {{ isset($id) ? ( $card_type->id === $card->card_type_id ? ' selected' : '' ) : '' }} >
                                {{ $card_type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="field_id" class="col-md-4 control-label">Serie</label>
                <div class="col-md-4">
                    <select class="form-control" name="field_id" id="field_id">
                        @foreach ($fields as $field)
                            <option value="{{ $field->id }}" {{ isset($id) ? ( $field->id === $card->field_id ? ' selected' : '' ) : '' }} >
                                {{ $field->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="grade_id" class="col-md-4 control-label">Classe</label>
                <div class="col-md-4">
                    <select class="form-control" name="grade_id" id="grade_id">
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}" {{ isset($id) ? ( $grade->id === $card->grade_id ? ' selected' : '' ) : '' }} >
                                {{ $grade->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="subject_id" class="col-md-4 control-label">Matiere</label>
                <div class="col-md-4">
                    <select class="form-control" name="subject_id" id="subject_id">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ isset($id) ? ( $subject->id === $card->subject_id ? ' selected' : '' ) : '' }} >
                                {{ $subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if (isset($id))
                <div class="form-group">
                    <label for="chapter_id" class="col-md-4 control-label">{{ __('chapters') }}</label>
                    <div class="col-md-4">
                        <select class="form-control" name="subject_id" id="subject_id">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ ($subject->id === $card->subject_id) ? ' selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @else
                <div class="form-group">
                    <label for="chapter_id" class="col-md-4 control-label">{{ __('chapters') }}</label>
                    <div class="col-md-4">
                        <select class="form-control" name="chapter_id[]" id="chapter_id">
                            @foreach ($chapters as $chapter)
                                <option value="{{ $chapter->id }}" >{{ $chapter->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif

            @if (isset($id))
                <div class="form-group">
                    <label for="status" class="col-md-4 control-label">Statut</label>
                    <div class="col-md-4">
                        <select class="form-control" name="status" id="status">
                            @foreach ($status as $key => $value)
                                <option value="{{ $key }}" {{ ($key === $card->status) ? ' selected' : '' }} >
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <label for="status" class="col-md-4 control-label">{{ __('Duration') }}</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="duration" value="{{ (isset($id)) ? $card->duration : '01:00' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="year" class="col-md-4 control-label">Annee</label>
                <div class="col-md-4">
                    <select class="form-control" name="year" id="year">
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ isset($id) ? ( $year === $card->year ? ' selected' : '' ) : '' }} >
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if (isset($id))
                @foreach ($exercises as $key => $exercise)
                    <div class="mmb ws-question">
                        <p><strong>Part {{ $key+1 }}</strong></p>
                        <p class="text-justify">{!! $exercise->content !!}</p>
                        <ol>
                            @foreach ($questions[$exercise->id] as $question)
                                <li>{{ $question->description }}</li>
                            @endforeach
                        </ol>
                    </div>
                @endforeach
            @else
                <div class="panel panel-default card-part ">
                    <div class="panel-body">
                        <span class="glyphicon glyphicon-plus-sign" id="btn_add_part" aria-hidden="true"></span>
                        <div class="card-exercice thumbnail">
                            <h4>Exercise</h4>
                            <textarea name="exercises[]" rows="4" cols="80" class="form-control"></textarea>
                            <div class="dropdown mmt">
                                <button class="btn btn-default dropdown-toggle" type="button" id="select_exercises" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Choose an existing exercise
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="select_exercises">
                                    @foreach ($exercises as $exercise)
                                        <li class="exercise-item">{{ substr($exercise->content, 0, 150) }}</li>
                                        <li role="separator" class="divider"></li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            <div class="card-questions">
                                <h4>Questions</h4>
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="" id="question_input">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-plus-sign"></span></span>
                                </div>
                                <ol id="questions_list">
                                    <li>Question 0</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-12 mmt">
                <button type="submit" class="btn btn-primary" name="btn_publish">{{ __('Publish') }}</button>
                <button type="submit" class="btn btn-secondary" name="btn_save">{{ __('Save') }}</button>
            </div>
        </form>
        <script src="/js/views/cards.js" ></script>
    @endsection
