@extends('layouts.frontend')
@section('content')
<div class="container">
    <ul class="nav nav-pills nav-fill ml-0" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true" aria-expanded="true">Address</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="designs-tab" data-toggle="tab" href="#designs" role="tab" aria-controls="designs" aria-selected="false">Designs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="artWork-tab" data-toggle="tab" href="#artWork" role="tab" aria-controls="artWork" aria-selected="false">Art Work</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews <span>(2)</span></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active in show" id="address" role="tabpanel" aria-labelledby="pricing-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <h2>Billing Address</h2>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {!! Form::open(['class'=>'form-horizontal']) !!}
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Name</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                                </div>
                                                <div class="col-sm-6">
                                                    {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Company name</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('company',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">1st Line address</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">2nd line address</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">City</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('city',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Country</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('country',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Post Code</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('post_code',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::hidden('type','billing_address') !!}
                                {!! Form::hidden('id') !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <h2>Default Shipping</h2>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {!! Form::open(['class'=>'form-horizontal']) !!}
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Name</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                                </div>
                                                <div class="col-sm-6">
                                                    {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Company name</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('company',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">1st Line address</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">2nd line address</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">City</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('city',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Country</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('country',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Post Code</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('post_code',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::hidden('type','default_shipping') !!}
                                {!! Form::hidden('id') !!}

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="designs" role="tabpanel" aria-labelledby="designs-tab">
            ..2..
        </div>
        <div class="tab-pane fade" id="artWork" role="tabpanel" aria-labelledby="artWork-tab">
            ..3..
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            ..4..
        </div>
    </div>
</div>
@stop