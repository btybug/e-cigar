@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="coupons_new_page card panel panel-default">
        <div class="card-header panel-heading">
            <h3 class="m-0">Purchase Invoice Form</h3>
        </div>
        <div class="card-body panel-body">

            <div class="col-xl-8">
                {!! Form::model($model,['url' => route('admin_inventory_purchase_invocies_save'),'id' => 'form-coupon','class' => '']) !!}
                {!! Form::hidden('id') !!}

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="invoiceNumber">Name</label>
                    <div class="col-sm-10">
                        {!! Form::text('name',null,['placeholder' => 'Invoice name','class'=> 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="invoiceNumber">Invoice number</label>
                    <div class="col-sm-10">
                        {!! Form::number('invoice_number',null,['placeholder' => 'Invoice number','class'=> 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="input-code">
                        <span data-toggle="tooltip" title="" data-original-title="">Invoice description</span></label>
                    <div class="col-sm-10">
                        {!! Form::textarea('description',null,[ 'class'=> 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="input-discount">PDF</label>
                    <div class="col-sm-10">
                        {!! media_button('pdf',$model,false) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 control-label" for="input-status"></label>
                    <div class="col-sm-10 text-right">
                        {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/custom.css?v='.rand(111,999))}}">
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.js"></script>
    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/bootstrap-tagsinput.js"></script>
    <script>
        $(".select-item").select2({width: '100%'});
    </script>
@stop
