@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " id="info-tab" href="{!! route('admin_settings_general') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
                       aria-controls="accounts" aria-selected="true" aria-expanded="true">Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_settings_regions') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Regions</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " id="general-tab" href="{!! route('admin_settings_footer') !!}" role="tab"
                       aria-controls="general" aria-selected="true" aria-expanded="true">Footer</a>
                </li>
            </ul>
            <div class="tab-content">
                {!! Form::open(['class'=>'form-horizontal']) !!}
                <div class="tab-content tab-content-store-settings">
                    <div class="tab-pane fade active in" id="tab1"
                         aria-labelledby="tab1-tab">
                        <div class="form-group">
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
                            <div class="tab-content pt-25">
                                @if(count(get_languages()))
                                    @foreach(get_languages() as $language)
                                        <div id="{{ strtolower($language->code) }}"
                                             class="tab-pane fade  @if($loop->first) in active @endif">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Panel Header
                                                        <div class="pull-right">
                                                            <button type="button" class="btn btn-success add-section"><i
                                                                        class="fa fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="textinput">Name</label>
                                                            <div class="col-md-4">
                                                                <input id="textinput" name="textinput" type="text"
                                                                       placeholder="placeholder"
                                                                       class="form-control input-md">
                                                            </div>
                                                        </div> <!-- Text input-->
                                                        <div class="links">
                                                            <div class="form-group">
                                                                <div class="col-md-5">
                                                                    <label class="col-md-4 control-label"
                                                                           for="textinput">Title</label>
                                                                    <div class="col-md-8">
                                                                        <input id="textinput" name="textinput"
                                                                               type="text"
                                                                               placeholder="placeholder"
                                                                               class="form-control input-md">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <label class="col-md-4 control-label"
                                                                           for="textinput">Link</label>
                                                                    <div class="col-md-8">
                                                                        <input id="textinput" name="textinput"
                                                                               type="text"
                                                                               placeholder="placeholder"
                                                                               class="form-control input-md">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="col-md-4">
                                                                        <button type="button"
                                                                                class="btn btn-success add-link"><i
                                                                                    class="fa fa-plus"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>


    </div>
    <script type="template" id="add-section">
        <div class="panel panel-default">
            <div class="panel-heading">Panel Header
                <div class="pull-right">
                    <button type="button" class="btn btn-danger remove-section"><i
                                class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="panel-body">
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="textinput">Name</label>
                    <div class="col-md-4">
                        <input id="textinput" name="textinput" type="text"
                               placeholder="placeholder"
                               class="form-control input-md">
                    </div>
                </div> <!-- Text input-->
                <div class="links">
                    <div class="form-group">
                        <div class="col-md-5">
                            <label class="col-md-4 control-label" for="textinput">Title</label>
                            <div class="col-md-8">
                                <input id="textinput" name="textinput" type="text"
                                       placeholder="placeholder"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label class="col-md-4 control-label" for="textinput">Link</label>
                            <div class="col-md-8">
                                <input id="textinput" name="textinput" type="text"
                                       placeholder="placeholder"
                                       class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success add-link"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
    <script type="template" id="add-link">
        <div class="form-group">
            <div class="col-md-5">
                <label class="col-md-4 control-label" for="textinput">Title</label>
                <div class="col-md-8">
                    <input id="textinput" name="textinput" type="text"
                           placeholder="placeholder"
                           class="form-control input-md">
                </div>
            </div>
            <div class="col-md-5">
                <label class="col-md-4 control-label" for="textinput">Link</label>
                <div class="col-md-8">
                    <input id="textinput" name="textinput" type="text"
                           placeholder="placeholder"
                           class="form-control input-md">
                </div>
            </div>
            <div class="col-md-2">
                <div class="col-md-4">
                    <button type="button"
                            class="btn btn-danger remove-link"><i
                                class="fa fa-minus"></i></button>
                </div>
            </div>
        </div>
    </script>
@stop

@section('css')


@stop


@section('js')
    <script type="text/javascript">
        $(function () {
            $('body').on('click', '.add-section', function () {
                let html = $('#add-section').html();
                $(this).closest('.panel-group').append(html);
            });
            $('body').on('click', '.remove-section', function () {
                $(this).closest('.panel').remove();
            });

            $('body').on('click', '.add-link', function () {
                let html = $('#add-link').html();
                $(this).closest('.links').append(html);
            });

            $('body').on('click', '.remove-link', function () {
                $(this).closest('.form-group').remove();
            });
        })
    </script>
@stop