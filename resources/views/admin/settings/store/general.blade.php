@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_store') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">General</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="shipping-tab" href="{!! route('admin_settings_shipping') !!}" role="tab"
                   aria-controls="shipping" aria-selected="false">Shipping</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_payment_gateways') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Payment gateways</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_couriers') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Courier </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_store_gifts') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Gifts</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="payment_gateways" href="{!! route('admin_settings_delivery') !!}"
                   role="tab"
                   aria-controls="shipping" aria-selected="false">Delivery Cost</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_tax_rates') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Tax Rates</a>
            </li>
        </ul>
        {!! Form::open(['class'=>'form-horizontal']) !!}
        <div class="" id="myTabContent">
            <div class="form-group">
                <div class="row">
                    <label for="text" class="control-label col-md-4">we ship to</label>
                    <div class="col-md-8">
                        {!! Form::text('we_ship_to',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">Stock availability</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4">Availabile stock status</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">

                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4">Out of stock status</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" checked>Enable Back order
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio">Disable order
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Currency</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <label class="col-md-4">Default product price in </label>
                                    <div class="col-md-8">
                                        {!! Form::select('default_currency_code',$currencies,$p,['class'=>'form-control default-currency']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <label class="col-md-4">Other currencies </label>
                                    <div class="col-md-8">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <table class="table table-responsive table-striped table-bordered">
                            <thead>
                            <tr class="info">
                                <th>Currency Code</th>
                                <th>Currency Exchange Rate</th>
                                <th>Update using Api</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="currency-list">
                            @foreach($siteCurrencies as $currency=>$rate)
                                <tr>
                                    <td>
                                        {!! Form::select('currency_code[]',$currencies,$currency,['class'=>'form-control']) !!}

                                    </td>
                                    <td>
                                        <input type="text" name="rate[]"  value="{!! $rate !!}" class="form-control">
                                    </td>
                                    <td class="w-10">
                                        <button type="button" class="btn btn-primary">Get live rate</button>
                                    </td>
                                    <td class="text-right w-5">
                                        <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa fa-minus"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4" class="text-right">
                                    <button type="button" class="btn btn-info btn-sm " id="add-more-currency"><i
                                                class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                            </tfoot>

                        </table>
                        <div>
                            <button type="submit" class="btn btn-info">Update All exchange rates</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    </div>
    <script type="template" id="currency_row">
        <tr>
            <td>
                {!! Form::select('currency_code[]',$currencies,null,['class'=>'form-control']) !!}

            </td>
            <td>
                <input type="text" name="rate[]" class="form-control">
            </td>
            <td class="w-10">
                <button type="button" class="btn btn-primary">Get live rate</button>
            </td>
            <td class="text-right w-5">
                <button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa fa-minus"></i></button>
            </td>
        </tr>
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')
    <script>
        $(function () {
            $('.default-currency').on('change', function () {
                let value = $(this).val();
                window.location.href='?p='+value;
            })
            $('#add-more-currency').on('click', function () {
                let html = $('#currency_row').html();
                $('#currency-list').append(html);
            });
            $('body').on('click', '.remove-row', function () {
                $(this).closest('tr').remove();
            });
        })
    </script>

@stop