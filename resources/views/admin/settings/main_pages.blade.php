@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="container-fluid">
        <div class="row flex-column">
            @include("admin.settings._partials.menu",['active'=> 'main_pages'])
        </div>
        <div class="tab-content">
            <div class="row">
                <div class="col-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">T&C</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-9">
                    {!! Form::model($model) !!}
                    <div class="tab-pane fade active in show" id="admin_settings_general">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-info mb-20 mt20" type="submit">Save</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card panel panel-default social-profile-page mb-3">
                                    <div class="card-header panel-heading">Main slider</div>
                                    <div class="card-body panel-body">
                                        <div class="form-group d-flex flex-wrap align-items-center social-media-group">
                                            @if($model && isset($model->data) && @json_decode($model->data,true))
                                                @php
                                                    $data = json_decode($model->data,true);
                                                @endphp
                                                @foreach($data as $key => $banner)
                                                    <div class="col-md-12 mb-2 d-flex flex-wrap banner-item">
                                                        <div class="col-sm-6 p-0">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    {!! media_button('banners[]',$banner) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            @if(!$key)
                                                                <button type="button"
                                                                        class="btn btn-primary add-new-social-input">
                                                                    <i class="fa fa-plus"></i></button>
                                                            @else
                                                                <button
                                                                    class="plus-icon remove-new-banner-input btn btn-danger">
                                                                    <i class="fa fa-minus"></i></button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-12 mb-2 d-flex flex-wrap banner-item">
                                                    <div class="col-sm-6 p-0">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                {!! media_button('banners[]',$model) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <button type="button" class="btn btn-primary add-new-social-input">
                                                            <i
                                                                class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="card panel panel-default social-profile-page mb-3">
                                    <div class="card-header panel-heading">Bottom banners</div>
                                    <div class="card-body panel-body">
                                        <div class="form-group d-flex flex-wrap align-items-center social-media-group">
                                            @if($model && isset($model->social_media) && @json_decode($model->social_media,true))
                                                @php
                                                    $social_medias=json_decode($model->social_media,true);
                                                @endphp
                                                @foreach($social_medias as $key=>$social_media)
                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-6 p-0">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                {!! Form::file('home_page['.$key.'][slider]') !!}
                                                                {{--{!! Form::hidden('social_media['.$key.'][social]',$social_media['social'],['class'=>'social_type']) !!}--}}
                                                            </div>
                                                            {{--{!! Form::text('social_media['.$key.'][url]', $social_media['url'], ['class' => 'form-control','id' => 'socialMedia','placeholder' => 'Profile URL','aria-label' => 'Text input with dropdown button']) !!}--}}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        @if(!$key)
                                                            <button type="button"
                                                                    class="btn btn-primary add-new-social-input">
                                                                <i
                                                                    class="fa fa-plus"></i></button>
                                                        @else
                                                            <button
                                                                class="plus-icon remove-new-social-input btn btn-danger">
                                                                <i class="fa fa-minus"></i></button>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-sm-6 p-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            {!! Form::file('home_page[0][slider]') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="button" class="btn btn-primary add-new-social-input"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>


    </div>

@stop
