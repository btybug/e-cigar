@extends('layouts.admin')
@section('content')
    <div class="inventory_attributes container-fluid">
        <div class="row dis-flex-wrap">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-7 pl-0">
                                <h2 class="m-0">Attribute</h2>
                            </div>
                            <div class="col-sm-5 p-0">
                                <div class="button-save text-right">
                                    <a class="btn btn-default pull-right"
                                       href="{!! route('admin_settings_tax_rates') !!}">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="panel-body">
                        <div>
                            {!! Form::model($model,['class'=>'form-horizontal','url'=>route('post_admin_settings_tax_create_or_update',($model)?$model->id:null)]) !!}
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
                                                <label class="col-sm-2 control-label"><span data-toggle="tooltip"
                                                                                            title=""
                                                                                            data-original-title="Couriers Name ">Tax Name</span></label>
                                                <div class="col-sm-10">
                                                    {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"><span data-toggle="tooltip"
                                                                                            title=""
                                                                                            data-original-title="Couriers Name ">Description</span></label>
                                                <div class="col-sm-10">
                                                    {!! Form::textarea('translatable['.strtolower($language->code).'][description]',get_translated($model,strtolower($language->code),'description'),['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="Tax Amount">Tax Amount</span></label>
                                <div class="col-sm-10">
                                    {!! Form::number('amount',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><span data-toggle="tooltip"
                                                                            title=""
                                                                            data-original-title="Tax Fixed/Percentage">Tax Type</span></label>
                                <div class="col-sm-10">
                                    {!! Form::select('type',['fixed'=>'Fixed','percentage'=>'Percentage'],null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group bord-top">
                                <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                              title=""
                                                                                              data-original-title="Icon Title">Icon</span></label>
                                <div class="col-sm-9">
                                    {!! Form::text('icon',null,['class'=>'form-control icon-picker']) !!}
                                </div>
                                <div class="col-sm-1 text-center font-icon-added">
                                    <i id="font-show-area"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    {!! Form::submit('Save',['class' => 'btn btn-info button_save']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop()
@section('js')
    <script src="https://farbelous.io/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
    <script>
        $('.icon-picker').iconpicker();
    </script>
@stop
@section("css")
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <style>
        #font-show-area {
            font-size: 50px;
            margin-top: 15px;
        }
    </style>
@stop