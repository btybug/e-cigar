@extends('layouts.frontend')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_address'])
            </div>
            <div class="col-md-10 row">
                <div class="col-md-6">
                    <div class="container">
                        <h2>Billing Address</h2>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {!! Form::model($billing_address,['class'=>'form-horizontal']) !!}
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
                                        <label for="text" class="control-label col-sm-4">Country</label>
                                        <div class="col-sm-8">
                                            {!! Form::select('country',['' => 'SELECT'] + $countries,null,['class'=>'form-control','id' => 'country']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hide">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Regions</label>
                                        <div class="col-sm-8">
                                            {!! Form::select('region',getRegions(@$billing_address->country,true),null,['class'=>'form-control','id' => 'regions']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hide">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">City</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('city',null,['class'=>'form-control']) !!}
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
                                <div class="form-group row">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
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
                                {!! Form::model($default_shipping,['class'=>'form-horizontal']) !!}
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
                                        <label for="text" class="control-label col-sm-4">Country</label>
                                        <div class="col-sm-8">
                                            {!! Form::select('country',$countriesShipping,null,['class'=>'form-control','id' => 'geo_country']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Regions</label>
                                        <div class="col-sm-8">
                                            {!! Form::select('region',getRegionByZone(@$default_shipping->country),null,['class'=>'form-control','id' => 'geo_region']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hide">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">City</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('city',null,['class'=>'form-control']) !!}
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
                                <div class="form-group row">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="container">
                        <h2>Address Book</h2>
                        <div class="panel panel-default">

                            <div class="panel-body row">
                                {{--Tab links--}}
                                <div class="col-md-3">
                                    <ul class="nav nav-pills nav-fill btn-group-vertical" role="tablist">
                                        <li>
                                            <a class="btn btn-secondary nav-link nav-link--new-address active" id="address1-tab" data-toggle="tab" href="#address-1" role="tab" aria-controls="address-1" aria-selected="true" aria-expanded="true">1</a>
                                            <a class="btn btn-secondary nav-link nav-link--new-address" id="address2-tab" data-toggle="tab" href="#address-2" role="tab" aria-controls="address-2">2</a>

                                        </li>
                                    </ul>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success add-new" data-toggle="modal" data-target="#newAddressModal">+ Add New</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="newAddressModal" tabindex="-1" role="dialog" aria-labelledby="newAddressModal" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add New Address</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form-horizontal">

                                                    <div class="modal-body">
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
                                                                        <input id="text" name="text" type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="text" class="control-label col-sm-4">1st Line address</label>
                                                                    <div class="col-sm-8">
                                                                        <input id="text" name="text" type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="text" class="control-label col-sm-4">2nd line address</label>
                                                                    <div class="col-sm-8">
                                                                        <input id="text" name="text" type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="text" class="control-label col-sm-4">City</label>
                                                                    <div class="col-sm-8">
                                                                        <input id="text" name="text" type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="text" class="control-label col-sm-4">Country</label>
                                                                    <div class="col-sm-8">
                                                                        <input id="text" name="text" type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <label for="text" class="control-label col-sm-4">Post Code</label>
                                                                    <div class="col-sm-8">
                                                                        <input id="text" name="text" type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Save Address</button>
                                                        <button type="button" class="btn btn-secondary">Discard</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--End Tab links--}}

                                {{--Tab Content--}}
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in show" id="address-1" role="tabpanel" aria-labelledby="address1-tab">
                                            <h5 class="text-center">Address 1</h5>

                                            <form class="form-horizontal">
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
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">1st Line address</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">2nd line address</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">City</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">Country</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">Post Code</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="address-2" role="tabpanel" aria-labelledby="address2-tab">
                                            <h5 class="text-center">Address 2</h5>

                                            <form class="form-horizontal">
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
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">1st Line address</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">2nd line address</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">City</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">Country</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="text" class="control-label col-sm-4">Post Code</label>
                                                        <div class="col-sm-8">
                                                            <input id="text" name="text" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--End Tab Content--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .btn-group-vertical .btn {
            width: 135px;
            border: 1px solid;
            margin-bottom: 3px;
        }

        .add-new {
            width: 135px;
        }
    </style>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#country").select2();
            $("#geo_country").select2();
            function getRegionsPackage(){
                let value = $("#country").val();
                AjaxCall(
                    "/get-regions-by-country",
                    { country: value},
                    res => {
                        let select = document.getElementById('regions');
                        select.innerText = null;
                        if (!res.error) {
                            $.each(res.data,function (index,value) {
                                var opt = document.createElement('option');
                                opt.value = res.data[value];
                                opt.innerHTML = res.data[value];
                                select.appendChild(opt);
                            })

                        }
                    }
                );
            }

            function getRegions(){
                let value = $("#geo_country").val();
                AjaxCall(
                    "/get-regions-by-geozone",
                    { country: value},
                    res => {
                        let select = document.getElementById('geo_region');
                        select.innerText = null;
                        if (!res.error) {
                            var opt = document.createElement('option');
                            opt.value = res.data.id;
                            opt.innerHTML = res.data.name;
                            select.appendChild(opt);
                        }
                    }
                );
            }

            $("body").on("change", "#country", function() {
                getRegionsPackage();
            });

            $("body").on("change", "#geo_country", function() {
                getRegions();
            });
        })
    </script>
@endsection