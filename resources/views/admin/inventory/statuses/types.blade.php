@extends('layouts.admin')

@section('content')
    @php
    $model=null
    @endphp
    <div class="col-md-12 inventory_attributes">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Options Courier </h2>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row bord-top bg-light attr-option" data-item-id="2" data-parent-id="1">
                            <div class="col-md-8">
                                Deliveried
                            </div>
                            <div class="col-md-4 text-right">

                            </div>
                        </div>
                        <div class="form-group row bord-top bg-light attr-option" data-item-id="3" data-parent-id="1">
                            <div class="col-md-8">
                                Shippend
                            </div>
                            <div class="col-md-4 text-right">

                            </div>
                        </div>
                        <div class="form-group row bord-top bg-light attr-option" data-item-id="4" data-parent-id="1">
                            <div class="col-md-8">
                                Confirmed
                            </div>
                            <div class="col-md-4 text-right">

                            </div>
                        </div>
                        <div class="form-group row bord-top">
                            <form method="POST" action="#" accept-charset="UTF-8"><input name="_token" type="hidden" value="UKBHve7gjHFA4dy2Q9XlXbVRF6dkzcRhlOzt49ej">
                                <input name="id" type="hidden">
                                <input name="parent_id" type="hidden" value="1">
                                <div class="col-md-8">
                                    <input class="form-control" name="translatable[gb][name]" type="text">
                                </div>
                                <div class="col-md-4 text-right">
                                    <input class="btn btn-primary" type="submit" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-9 options-form">
                        <div class="col-md-9 options-form">
                                {!! Form::model($model) !!}
                                {!! Form::hidden('id',null) !!}
                                @if(count(get_languages()))
                                    <ul class="nav nav-tabs">
                                        @foreach(get_languages() as $language)
                                            <li class="@if($loop->first) active @endif"><a data-toggle="tab"
                                                                                           href="#{{ strtolower($language->code) }}">
                                                    <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                                </a></li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="tab-content">
                                    @if(count(get_languages()))
                                        @foreach(get_languages() as $language)
                                            <div id="{{ strtolower($language->code) }}"
                                                 class="tab-pane fade  @if($loop->first) in active @endif">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <label>Status Name</label>
                                                            {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control','required'=>true]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <label>Description</label>
                                                            {!! Form::textarea('translatable['.strtolower($language->code).'][description]',get_translated($model,strtolower($language->code),'description'),['class'=>'form-control','required'=>true,'rows'=>5]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label>Icon</label>
                                            {!! Form::text('icon',null,['class'=>'form-control icon-picker','required'=>true]) !!}
                                        </div>
                                        <div class="col-md-2">
                                            <i id="font-show-area"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label>Color</label>
                                            {!! Form::text('color',null,['class'=>'form-control','required'=>true]) !!}
                                        </div>
                                        <div class="col-md-2">
                                            <i id="font-show-area"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
                                </div>
                                {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
