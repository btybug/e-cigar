@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" id="general-tab" href="{!! route('admin_settings_translations') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Products</a>
            </li>
        </ul>
        <div class="tab-content">
            {!! Form::model($model,['class'=>'form-horizontal']) !!}
            <div class="card panel panel-default mb-3">
                <div class="card-body panel-body">
                    <div class="form-group">
                        @foreach($products as $product)
                        <div class="row">
                            <h3>{!! $product->name !!} translation</h3>
                        </div>
                        <div class="row">
                            @if(count(get_languages()))
                                <ul class="nav nav-tabs">
                                    @foreach(get_languages() as $language)
                                        <li class="nav-item"><a
                                                class="nav-link @if($loop->first) active @endif"
                                                data-toggle="tab"
                                                href="#{{ strtolower($language->code) }}">
                                                                            <span
                                                                                class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="tab-content mt-20">
                                @if(count(get_languages()))
                                    @foreach(get_languages() as $language)
                                        <div id="{{ strtolower($language->code) }}"
                                             class="tab-pane fade  @if($loop->first) in active show @endif">
                                            <div class="form-group row mt-3">
                                                <label
                                                    class="col-xl-2 control-label col-form-label text-xl-right"><span
                                                        data-toggle="tooltip"
                                                        title=""
                                                        data-original-title="Attribute Name Title">Product Name</span></label>
                                                <div class="col-xl-10">
                                                    {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label
                                                    class="col-xl-2 control-label col-form-label text-xl-right"><span
                                                        data-toggle="tooltip"
                                                        title=""
                                                        data-original-title="Short Description">Short Description</span></label>
                                                <div class="col-xl-10">
                                                    {!! Form::textarea('translatable['.strtolower($language->code).'][short_description]',get_translated($model,strtolower($language->code),'short_description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')
    <script>
        $(function () {
            function makeid() {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 9; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }
        })
    </script>

@stop
