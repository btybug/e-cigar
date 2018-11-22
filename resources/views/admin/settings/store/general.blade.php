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
        <div class="" id="myTabContent">
            {!! Form::open(['class'=>'form-horizontal']) !!}

            <div class="form-group">
                <div class="row">
                    <label for="text" class="control-label col-md-4">we ship to</label>
                    <div class="col-md-8">
                        {!! Form::text('we_ship_to',null,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
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
                                        <select class="form-control default-currency" name="">
                                            <option value="USD">USD</option>
                                            <option value="GBP" selected="selected">GBP</option>
                                            <option value="AMD">AMD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <label class="col-md-4">Other currencies </label>
                                    <div class="col-md-8">
                                        {{--<select class="form-control default-currency" name="">--}}
                                        {{--<option value="USD" >USD</option>--}}
                                        {{--<option value="GBP" selected="selected">GBP</option>--}}
                                        {{--<option value="AMD">AMD</option>--}}
                                        {{--</select>--}}
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
                            <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="">
                                        <option value="1" selected="selected">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                                <td class="w-10">
                                    <button class="btn btn-primary">Get live rate</button>
                                </td>
                                <td class="text-right w-5">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
                                </td>
                            </tr>
                            {{--@foreach($rates['rates'] as $key=>$value)--}}
                            {{--<tr>--}}
                            {{--<td>{!! $key !!}</td>--}}

                            {{--<td>--}}
                            {{--<input class="form-control" readonly value="{!! $value !!}" name="" type="text">--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-secondary">Update now <i class="fa fa-repeat"></i></button>--}}
                            {{--</td>--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}

                            </tbody>
                            <tfoot>
                              <tr>
                                  <td colspan="4" class="text-right"><button class="btn btn-info btn-sm"><i class="fa fa-plus"></i></button></td>
                              </tr>
                            </tfoot>

                        </table>
                        <div>
                            <button class="btn btn-info">Update All exchange rates</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">

@stop
@section('js')
    <script>
        $(function () {
            $('.default-currency').on('change', function () {
                let value = $(this).val();
                $('.currency').val(value)
                $('.currency').text(value)
            })
        })
    </script>

@stop