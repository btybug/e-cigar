@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row flex-column">
            @include("admin.settings._partials.menu",['active'=> 'home'])
            <div class="tab-content">
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
                                                        <button type="button" class="btn btn-primary add-new-social-input">
                                                            <i
                                                                class="fa fa-plus"></i></button>
                                                    @else
                                                        <button class="plus-icon remove-new-social-input btn btn-danger">
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
                                                        <button type="button" class="btn btn-primary add-new-social-input">
                                                            <i
                                                                class="fa fa-plus"></i></button>
                                                    @else
                                                        <button class="plus-icon remove-new-social-input btn btn-danger">
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
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/plugins/timepicker/bootstrap-timepicker.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

@stop


@section('js')
    {!! Html::script("public/admin_theme/plugins/timepicker/bootstrap-timepicker.js")!!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(function () {


            $(".calendar").datepicker();
            $('.timepicker1').timepicker();
            $('#first_line_country').select2();
            $("body").on("click", ".add-new-social-input", function () {
                var uid = Math.random().toString(36).substr(2, 9);
                var html = `<div class="clearfix">
                    </div><div class="d-flex align-items-center w-100 social-container mt-3">
                    <div class="col-sm-6 p-0">
                    <div class="input-group">
                    <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dark_blue_gradient-cl dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-facebook-f icon-blue"></i>
                    </button><div class="dropdown-menu">
                    <a class="dropdown-item active"  href="javascript:void(0);"> <i class="fa fa-facebook icon-green"></i>  <span class="name">Facebook</span> </a> <a class="dropdown-item" href="javascript:void(0);"> <i class="fa fa-twitter icon-green"></i> <span class="name">Twitter</span></a>
                    <a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-yahoo icon-purple"></i>
                    <span class="name">Yahoo</span></a><a class="dropdown-item" href="javascript:void(0);">
                    <i class="fa fa-google icon-red"></i><span class="name">Google</span> </a> </div>
                    <input name="social_media[${uid}][social]" value="fab fa-facebook icon-green" type="hidden" class="social_type">
                    </div>
                    <input name="social_media[${uid}][url]" type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Profile URL">
                    </div></div><div class="col-sm-3"><button class="plus-icon remove-new-social-input btn btn-danger">
                    <i class="fa fa-minus"></i></button></div></div>`;
                $(".social-media-group").append(html);
            });

            $("body").on("click", ".remove-new-social-input", function () {
                $(this).closest(".social-container").remove();
            });

            $("body").on("click", "#add-more-hours", function () {
                var uid = Math.random().toString(36).substr(2, 9);
                var html = '<tr><td><div class="form-group"><label for="weekday" class="mb-0">Weekday</label><select class="form-control"  name="opening_hours[weekday][]"><option value="Sunday" selected="selected">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option></select> </div> </td> <td> ' +
                    '<div class="form-group"> ' +
                    '<strong>From</strong> ' +
                    '<div class="input-group bootstrap-timepicker timepicker">' +
                    '<input class="form-control timepicker1" name="opening_hours[time_from][]" type="text" >' +
                    '<label class="input-group-addon input-group-append" for="timepicker1">' +
                    '<span class="input-group-text h-100"> <i class="fa fa-clock-o"></i></span>' +
                    '</div></div> </td> <td> <div class="form-group"> ' +
                    '<strong>To</strong> ' +
                    '<div class="input-group bootstrap-timepicker timepicker"> ' +
                    '<input class="form-control timepicker1" name="opening_hours[time_to][]" type="text"> ' +
                    '<label class="input-group-addon input-group-append" for="timepicker2">' +
                    '<span class="input-group-text h-100"> <i class="fa fa-clock-o"></i></span>' +
                    '</label> </div> </div> </td> <td><button type="button" class="btn btn-danger pull-right remove-hour"><i class="fa fa-minus"></i></button>' +
                    '</td></tr>';
                $("#working-hours").append(html);
                $('.timepicker1').timepicker();
            });

            $("body").on("click", ".remove-hour", function () {
                $(this).closest("tr").remove();
            });
            $("body").on("click", "#add-more-calendar", function () {
                var uid = Math.random().toString(36).substr(2, 9);
                var html = '<tr> ' +
                    '<td> ' +
                    '<label for="calendar">Calendar</label> ' +
                    '<div class="input-group"> ' +
                    '<input class="form-control calendar" name="calendar[holidays][]" type="text"> ' +
                    '<label class="input-group-addon input-group-append" for="calendar"><span class="input-group-text h-100"><i class="fa fa-calendar"></i></span></label> ' +
                    '</div> ' +
                    '</td> ' +
                    '<td> ' +
                    '<input class="form-control" name="calendar[reason][]" type="text"> ' +
                    '</td> ' +
                    '<td> ' +
                    '<button type="button" class="btn btn-danger pull-right remove-calendar"><i class="fa fa-minus"></i></button> ' +
                    '</td> ' +
                    '</tr>';
                $("#calendar").append(html);
                $(".calendar").datepicker();

            });

            $("body").on("click", ".remove-calendar", function () {
                $(this).closest("tr").remove();
            });

            $("body").on("click", ".social-profile-page .dropdown-item", function () {
                var parent = $(this).closest(".input-group-prepend").find(".dropdown-toggle").find("i");

                var classList = $(this).find("i").attr("class");

                parent.attr("class", "").addClass(classList);
                $(this).closest(".input-group-prepend").find('.social_type').val(classList);
                $(this).parent().children().removeClass('active')
                $(this).addClass('active')
            });
        });
    </script>
@stop