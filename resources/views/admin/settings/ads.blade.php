@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="container-fluid">
        <div class="row flex-column">
            @include("admin.settings._partials.menu",['active'=> 'main_pages'])

            <div class="tab-content">
                <div class="row">
                    <div class="col-sm-12">
                        @include("admin.settings._partials.main_pages.ads",['p' => 'ads'])
                    </div>
                </div>

            </div>
        </div>

    </div>
    <script type="template" id="add-more-banners">
        <div class="col-md-12 mb-2 d-flex flex-wrap banner-item">
            <div class="col-sm-6 p-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        {!! media_button($p.'[]',$model) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <button class="plus-icon remove-new-banner-input btn btn-danger">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
    </script>
@stop
