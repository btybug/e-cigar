@extends('layouts.frontend')
@section('content')
    <main class="page-main-content">
        <div class="d-flex h-100">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('frontend._partials.left_bar')

            <div class="main-right-wrapp">
                <div class="container mt-5">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li>
                            <a class="btn btn-info nav-link nav-link--new-address active" id="billingAddress-tab"
                               data-toggle="tab" href="#billingAddress" role="tab" aria-controls="billingAddress"
                               aria-selected="true" aria-expanded="true">Billing Address</a>
                        </li>
                        <li>
                            <a class="btn btn-info nav-link nav-link--new-address" id="shippingAddress-tab"
                               data-toggle="tab" href="#shippingAddress" role="tab" aria-controls="shippingAddress">Shipping
                                Address</a>
                        </li>
                        <li>
                            <a class="btn btn-info nav-link nav-link--new-address" id="addressBook-tab"
                               data-toggle="tab"
                               href="#addressBook" role="tab" aria-controls="addressBook">Address Book</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in show p-4" id="billingAddress" role="tabpanel"
                             aria-labelledby="billingAddress-tab">
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
                                        {!! Form::select('country',['' => 'SELECT'] + $countries,null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hide">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Regions</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('region',null,['class'=>'form-control','id' => 'regions']) !!}
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
                        <div class="tab-pane fade p-4" id="shippingAddress" role="tabpanel"
                             aria-labelledby="shippingAddress-tab">
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
                                        {!! Form::select('region',getRegionByZone(@$default_shipping->country),$default_shipping->region?$default_shipping->region:null,['class'=>'form-control','id' => 'geo_region']) !!}
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
                        <div class="tab-pane fade p-4" id="addressBook" role="tabpanel"
                             aria-labelledby="addressBook-tab">
                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <div>
                                        <div class="p-5">

                                            <div class="form-group row mb-5">
                                                <div class="col-md-5">
                                                    <h5>
                                                        <label for="selectAddress" class="control-label text-muted">Select
                                                            your address</label>
                                                    </h5>
                                                </div>
                                                <div class="col-md-7 d-flex">
                                                {!! Form::select('address_book',$address,null,['class' => 'form-control select-address']) !!}
                                                <!-- Button trigger modal -->
                                                    <button type="button"
                                                            class="nav-link nav-link--new-address btn btn-info address-book-new">
                                                        + Add New
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="border py-3 px-4">
                                                <div class="render-address">

                                                </div>
                                                <button type="submit" class="btn btn-primary edit-address">Edit</button>
                                                <button type="button" class="btn btn-danger edit-address">Delete
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    {{--Inner Tab Content--}}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </main>


    <div class="modal fade" id="newAddressModal" tabindex="-1" role="dialog"
         aria-labelledby="newAddressModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Address Book</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body address-form">

                </div>
            </div>
        </div>
    </div>

@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $("body").on('click', '.save-address-book', function () {
                var form = $(".address-book-form").serialize();
                AjaxCall(
                    "/my-account/save-address-book",
                    form,
                    res = > {
                    if (
                !res.error
                )
                {
                    window.location.reload();
                }
            },
                error =
                >
                {
                    if (error.status == 422) {
                        $('.errors').html('');
                        for (var err in error.responseJSON.errors) {
                            $('.errors').append(error.responseJSON.errors[err] + '<br>');
                        }
                    }
                }
                )
                ;
            })

            $("#country").select2();
            $("#geo_country").select2();
            function getRegionsPackage() {
                let value = $("#country").val();
                AjaxCall(
                    "/get-regions-by-country",
                    {country: value},
                    res = > {
                    let select = document.getElementById('regions');
                select.innerText = null;
                if (!res.error) {
                    $.each(res.data, function (index, value) {
                        var opt = document.createElement('option');
                        opt.value = res.data[value];
                        opt.innerHTML = res.data[value];
                        select.appendChild(opt);
                    })

                }
            }
            )
                ;
            }

            $("body").on('click', '.address-book-new', function () {
                AjaxCall(
                    "/my-account/address-book-form",
                    {},
                    res = > {
                    if (
                !res.error
                )
                {
                    $(".address-form").html(res.html);
                    $("#geo_country_book").select2();
                    $("#newAddressModal").modal();
                }
            }
                )
                ;
            });

            $("body").on('click', '.edit-address', function () {
                var id = $(".select-address").val();
                AjaxCall(
                    "/my-account/address-book-form",
                    {id: id},
                    res = > {
                    if (
                !res.error
                )
                {
                    $(".address-form").html(res.html);
                    $("#geo_country_book").select2();
                    $("#newAddressModal").modal();
                }
            }
                )
                ;
            });

            function getRegions() {
                let value = $("#geo_country").val();
                AjaxCall(
                    "/get-regions-by-geozone",
                    {country: value},
                    res = > {
                    let select = document.getElementById('geo_region');
                select.innerText = null;
                if (!res.error) {
                    var opt = document.createElement('option');
                    $.each(res.data, function (k, v) {
                        var option = $(opt).clone();
                        option.val(k);
                        option.text(v);
                        $(select).append(option);
                    });

                }
            }
            )
                ;
            }

            function renderAddressBook() {
                let value = $(".select-address").val();
                AjaxCall(
                    "/my-account/select-address-book",
                    {id: value},
                    res = > {
                    if (
                !res.error
            )
                {
                    $(".render-address").html(res.html);
                }
            }
            )
                ;
            }

            renderAddressBook();
            $("body").on("change", ".select-address", function () {
                renderAddressBook();
            });

            $("body").on("change", "#country", function () {
                getRegionsPackage();
            });

            $("body").on("change", "#geo_country", function () {
                getRegions();
            });

            $("body").on("change", "#geo_country_book", function () {
                var value = $(this).val();
                AjaxCall(
                    "/get-regions-by-geozone",
                    {country: value},
                    res = > {
                    let select = document.getElementById('geo_region_book');
                select.innerText = null;
                if (!res.error) {
                    var opt = document.createElement('option');
                    $.each(res.data, function (k, v) {
                        var option = $(opt).clone();
                        option.val(k);
                        option.text(v);
                        $(select).append(option);
                    });
                }
            }
                )
                ;
            });
        })
    </script>
@endsection