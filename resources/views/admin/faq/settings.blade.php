@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-wrap justify-content-between w-100 admin-general--tabs-wrapper">
            <ul class="nav nav-tabs new-main-admin--tabs mb-3 admin-general--tabs" id="myTab" role="tablist">
                @ok('admin_faq_settings')
                    <li class="nav-item ">
                        <a class="nav-link active" id="general-tab" href="{!! route('admin_faq_settings') !!}" role="tab"
                           aria-controls="general" aria-selected="true" aria-expanded="true">Settings</a>
                    </li>
                @endok

                @ok('admin_faq_setting_category')
                <li class="nav-item ">
                    <a class="nav-link" id="invoice-tab" href="{!! route('admin_faq_setting_category') !!}" role="tab"
                       aria-controls="shipping" aria-selected="false">Category</a>
                </li>
                @endok
            </ul>
        </div>
        <div class="tab-content">
            <div class="card-body panel-body">
                <div class="row">
                        {!! Form::model($general,['class' => 'form-horizontal']) !!}
                        <div class="form-group row">
                            {{Form::label('category','Select Category',['class' => 'col-sm-2 control-label'])}}
                            <div class="col-sm-10">
                                {{Form::select('category', ['' => "Select"]+$types,null,['id' => 'category','class' => $errors->has('category') ? 'form-control  is-invalid' : "form-control "])}}

                            </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@stop



@section('js')
    <script src="https://mbraak.github.io/jqTree/tree.jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://farbelous.io/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js"></script>
@stop
@section("css")
    <link rel="stylesheet" href="https://mbraak.github.io/jqTree/jqtree.css">
    {{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">--}}
    <link rel="stylesheet" href="https://farbelous.io/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@stop
