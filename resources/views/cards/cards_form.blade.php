<?php $subbar = 'cards'; ?>
@extends('layouts.master')
@section('title')
    Fiches
@stop

@section('blue-wrap')
    Fiches - Create - Edit
@stop
@section('styles')
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">
@endsection
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
                    <label for="chapter_ids" class="col-md-4 control-label">{{ __('chapters') }}</label>
                    <div class="col-md-4">
                        <select class="form-control selectpicker" name="chapter_ids[]" id="chapter_ids" multiple>
                            @foreach ($chapters as $chapter)
                                <option value="{{ $chapter->id }}" {{ in_array($chapter->id, $card_chapters) ? ' selected' : '' }} >{{ $chapter->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @else
                <div class="form-group">
                    <label for="chapter_ids" class="col-md-4 control-label">{{ __('chapters') }}</label>
                    <div class="col-md-4">
                        <select class="form-control selectpicker" name="chapter_ids[]" id="chapter_ids" multiple>
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
                    <input type="text" class="form-control" name="duration" value="{{ (isset($id)) ? substr($card->duration, 0, 5) : '01:00' }}">
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
                    <div class="panel panel-default card-part ">
                        <div class="panel-body" id="parts_panel">
                            <span class="glyphicon glyphicon-plus-sign" id="btn_add_part" aria-hidden="true"></span>
                            <div class="card-exercice thumbnail mmb">
                                <span class="glyphicon glyphicon-remove-circle" data-event="delete_part" aria-hidden="true"></span>
                                <h4>Exercise</h4>
                                <textarea name="exercises[{{ $key }}]" rows="6" cols="80" class="form-control" required="">{!! $exercise->content !!}</textarea>
                                <hr>
                                <div class="card-questions">
                                    <h4>Questions</h4>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-event="question_input">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" data-event="add_question" data-index="{{ $key }}">
                                                <span class="glyphicon glyphicon-plus-sign"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <ol data-tag="questions_list">
                                        @foreach ($questions[$exercise->id] as $question)
                                            <li>
                                                <button class="btn btn-default" type="button" data-event="delete_question">
                                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                                </button>
                                                {{ $question->description }}
                                                <input type="hidden" name="questions[{{ $key }}][]" value="{{ $question->description }}">
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="panel panel-default card-part ">
                    <div class="panel-body" id="parts_panel">
                        <span class="glyphicon glyphicon-plus-sign" id="btn_add_part" aria-hidden="true"></span>
                        <div class="card-exercice thumbnail mmb">
                            <span class="glyphicon glyphicon-remove-circle" data-event="delete_part" aria-hidden="true"></span>
                            <h4>Exercise</h4>
                            <textarea name="exercises[1]" rows="6" cols="80" class="form-control" required=""></textarea>
                            <hr>
                            <div class="card-questions">
                                <h4>Questions</h4>
                                <div class="input-group">
                                    <input type="text" class="form-control" data-event="question_input">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-event="add_question" data-index="1">
                                            <span class="glyphicon glyphicon-plus-sign"></span>
                                        </button>
                                    </span>
                                </div>
                                <ol data-tag="questions_list"></ol>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <button type="button" style="display: none;" id="btn_submit" value="submit"></button>
        </form>
        @if (!isset($id))
            <div class="col-lg-12 mmt">
                <button type="submit" class="btn btn-primary" name="btn_publish">{{ __('Publish') }}</button>
                <button type="submit" class="btn btn-secondary" name="btn_save">{{ __('Save') }}</button>
            </div>
        @else
            <div class="col-lg-12 mmt">
                <button type="submit" class="btn btn-primary" name="btn_save">{{ __('Save') }}</button>
            </div>
        @endif

        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_field">
    @endsection

    @section('scripts')
        <script src="/js/bootstrap-select.min.js" ></script>
        <script src="/js/views/cards.js" ></script>
    @endsection
