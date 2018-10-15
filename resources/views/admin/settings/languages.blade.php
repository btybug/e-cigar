@extends('layouts.admin')
@section('content')
    <section class="settings_lang">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listing All Languages </h3>
                        <div class="box-tools pull-right">
                            <a href="{!! route('admin_settings_languages_new') !!}" type="button" class="btn btn-block btn-primary">Add</a>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                            </div>
                        </div>

                        <div class="row default-div hidden">
                            <div class="col-xs-12">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    Default language has been changed successfully!
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Default</th>
                                        <th>Language</th>
                                        <th>Native</th>
                                        <th>Icon</th>
                                        <th>Code</th>
                                        <th>Shared</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($languages as $language)
                                        <tr>
                                            <td>
                                                <label>
                                                    <input type="radio" name="languages_id" value="{!! $language->id !!}" @if($language->default) checked @endif class="default_language">
                                                </label>
                                            </td>
                                            <td>{!! $language->name !!}</td>
                                            <td>{!! $language->original_name !!}</td>
                                            <td><span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span></td>
                                            <td>{!! $language->code !!}</td>
                                            <td>{!! ($language->shared) ? "YES" : "NO" !!}</td>
                                            <td>
                                                <a href="{!! route('admin_settings_languages_edit',$language->id) !!}" data-toggle="tooltip" data-placement="bottom"  title="{!! $language->name !!}"  class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                                <a href="{!! route('admin_settings_languages_delete',$language->id) !!}" data-toggle="tooltip" data-placement="bottom" title="{!! $language->name !!}" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col-xs-12 text-right">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')

@stop