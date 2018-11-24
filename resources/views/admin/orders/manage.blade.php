@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="col-md-6 pull-left"><h2>Orders</h2></div>
            <div class="col-md-6">
                <div class="pull-right">
                    <a class="btn btn-info" href="{!! route('admin_orders_new') !!}">Add new</a>
                    <a href="#" target="_blank" data-toggle="tooltip" title="" class="btn btn-info"
                       data-original-title="Print Invoice"><i class="fa fa-print"></i></a>
                    <a href="#" target="_blank" data-toggle="tooltip" title="" class="btn btn-info"
                       data-original-title="Print Shipping List"><i class="fa fa-truck"></i></a>
                    <a href="https://demo.opencart.com/admin/index.php?route=sale/order&amp;user_token=qrdym7jfe8IAJBo84RMx4PEZ9O2lQxml"
                       data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i
                                class="fa fa-reply"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row order-main-cnt">
        <div class="col-md-8">
            <div class="order-main-cnt_left-col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" id="general-tab" data-toggle="tab" href="#general" role="tab"
                           aria-controls="general" aria-selected="true" aria-expanded="true">Order Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="seeOrder-tab" data-toggle="tab" href="#seeOrder" role="tab"
                           aria-controls="seeOrder" aria-selected="false">See Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="editOrder-tab" data-toggle="tab" href="#editOrder" role="tab"
                           aria-controls="editOrder" aria-selected="false">Edit Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="invoiceOrder-tab" data-toggle="tab" href="#invoiceOrder" role="tab"
                           aria-controls="invoiceOrder" aria-selected="false">Invoice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="managementOrder-tab" data-toggle="tab" href="#managementOrder" role="tab"
                           aria-controls="managementOrder" aria-selected="false">Management</a>
                    </li>
                </ul>
                <div class="tab-content tab-content-store-settings">
                    <div class="tab-pane fade active in" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Order Details</h3>
                                    </div>
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td style="width: 1%;">
                                                <button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                                        data-original-title="Store"><i
                                                            class="fa fa-shopping-cart fa-fw"></i></button>
                                            </td>
                                            <td><a href="https://demo.opencart.com/" target="_blank">Your Store</a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                                        data-original-title="Date Added"><i
                                                            class="fa fa-calendar fa-fw"></i></button>
                                            </td>
                                            <td>{!! BBgetDateFormat($order->created_at) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                                        data-original-title="Payment Method"><i
                                                            class="fa fa-credit-card fa-fw"></i></button>
                                            </td>
                                            <td>{!! $order->payment_method !!}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                                        data-original-title="Shipping Method"><i
                                                            class="fa fa-truck fa-fw"></i></button>
                                            </td>
                                            <td>{!! $order->shipping_method !!}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-user"></i> Customer Details</h3>
                                    </div>
                                    @if($order->user)
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td style="width: 1%;">
                                                    <button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                                            data-original-title="Customer"><i class="fa fa-user fa-fw"></i>
                                                    </button>
                                                </td>
                                                <td>{!! $order->user->name.' '.$order->user->last_name !!}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                                            data-original-title="Customer Group"><i
                                                                class="fa fa-group fa-fw"></i></button>
                                                </td>
                                                <td>Default</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                                            data-original-title="E-Mail"><i
                                                                class="fa fa-envelope-o fa-fw"></i>
                                                    </button>
                                                </td>
                                                <td><a href="{!! $order->user->email !!}">{!! $order->user->email !!}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                                            data-original-title="Telephone"><i
                                                                class="fa fa-phone fa-fw"></i>
                                                    </button>
                                                </td>
                                                <td>{!! $order->user->phone !!}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="panel panel-default panel--orders-addresses">
                                    <ul class="nav nav-tabs nav-addresses" role="tablist">
                                        <li class="nav-item active">
                                            <div class="panel-heading">
                                                <a class="nav-link" id="shippingAddress-tab" data-toggle="tab"
                                                   href="#shippingAddress" role="tab" aria-controls="shippingAddress"
                                                   aria-selected="true" aria-expanded="true">
                                                <span class="panel-title"><i class="fa fa-user"></i>
                                                    Shipping address
                                                </span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="nav-item active">
                                            <div class="panel-heading">
                                                <a class="nav-link" id="billingAddress-tab" data-toggle="tab"
                                                   href="#billingAddress" role="tab" aria-controls="billingAddress"
                                                   aria-selected="true" aria-expanded="true">
                                                <span class="panel-title"><i class="fa fa-user"></i>
                                                    Billing address
                                                </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="tab-content tab-content--addresses">
                                        <div class="tab-pane fade active in" id="shippingAddress" role="tabpanel"
                                             aria-labelledby="shippingAddress-tab">
                                            Country:{!! getCountryByZone($order->shippingAddress->country)->name !!}<br>
                                            Region:{!! getRegion($order->shippingAddress->region,'name')  !!}
                                            <br>
                                            First line:{!! $order->shippingAddress->first_line_address !!}<br>
                                            Second line:{!! $order->shippingAddress->second_line_address !!}
                                            Post code:{!! $order->shippingAddress->post_code !!}
                                        </div>
                                        <div class="tab-pane fade" id="billingAddress" role="tabpanel"
                                             aria-labelledby="billingAddress-tab">
                                            Country:{!! $order->billingAddress->country !!}<br>
                                            Region:{!! $order->billingAddress->region !!}<br>
                                            City:{!! $order->billingAddress->city !!}<br>
                                            First line:{!! $order->billingAddress->first_line_address !!}<br>
                                            Second line:{!! $order->billingAddress->second_line_address !!}
                                            Post code:{!! $order->billingAddress->post_code !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table--order-dtls">
                                    <thead>
                                    <tr>
                                        <td class="text-left">Product</td>
                                        <td class="text-left">SKU</td>
                                        <td class="text-right">Quantity</td>
                                        <td class="text-right">Unit Price</td>
                                        <td class="text-right">Total</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td class="text-left"><a
                                                        href="">{!! $item->name !!}</a>
                                            </td>
                                            <td class="text-left">
                                                {!! $item->sku !!}<br>
                                                @php
                                                    $options=$item->options;
                                                        $lastElement = end($options);
                                                @endphp
                                                <b>
                                                    @foreach($options as $key=>$option)
                                                        {!! $key !!}: {!! $option !!} @if($option!=$lastElement) , @endif
                                                    @endforeach
                                                </b>

                                            </td>
                                            <td class="text-right">{!! $item->qty !!}</td>
                                            <td class="text-right">$@convert($item->amount/$item->qty)</td>
                                            <td class="text-right">$@convert($item->amount)</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4" class="text-right">Sub-Total</td>
                                        <td class="text-right">$@convert($order->amount-$order->shipping_price)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">Shipping ({!! $order->shipping_method !!})</td>
                                        <td class="text-right">$@convert($order->shipping_price)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">Total</td>
                                        <td class="text-right">$@convert($order->amount)</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tabe-pane--see-order fade" id="seeOrder" role="tabpanel"
                         aria-labelledby="seeOrder-tab">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-info-circle"></i> Order (#{!! $order->id !!})</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table--see-order">
                                    <thead>
                                    <tr>
                                        <td class="text-left half-col">Payment Address</td>
                                        <td class="text-left half-col">Shipping Address</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-left">
                                            Country:{!! $order->billingAddress->country !!}<br>
                                            Region:{!! $order->billingAddress->region !!}<br>
                                            City:{!! $order->billingAddress->city !!}<br>
                                            First line:{!! $order->billingAddress->first_line_address !!}<br>
                                            Second line:{!! $order->billingAddress->second_line_address !!}
                                            Post code:{!! $order->billingAddress->post_code !!}
                                        </td>
                                        <td class="text-left">
                                            Country:{!! getCountryByZone($order->shippingAddress->country)->name !!}<br>
                                            Region:{!! $order->shippingAddress->region !!}<br>
                                            City:{!! $order->shippingAddress->city !!}<br>
                                            First line:{!! $order->shippingAddress->first_line_address !!}<br>
                                            Second line:{!! $order->shippingAddress->second_line_address !!}
                                            Post code:{!! $order->shippingAddress->post_code !!}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tabe-pane--edit-order fade" id="editOrder" role="tabpanel"
                         aria-labelledby="editOrder-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link" id="customerDtls-tab" data-toggle="tab" href="#customerDtls" role="tab"
                                   aria-controls="customerDtls" aria-selected="true" aria-expanded="true">1. Customer
                                    Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="products-tab" data-toggle="tab" href="#products" role="tab"
                                   aria-controls="products" aria-selected="false">2. Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="paymentDtls-tab" data-toggle="tab" href="#paymentDtls" role="tab"
                                   aria-controls="paymentDtls" aria-selected="false">3. Payment Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="shippingDtls-tab" data-toggle="tab" href="#shippingDtls" role="tab"
                                   aria-controls="shippingDtls" aria-selected="false">4. Shipping Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="totals-tab" data-toggle="tab" href="#totals" role="tab"
                                   aria-controls="totals" aria-selected="false">5. Totals</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-content-store-settings">
                            <div class="tab-pane fade active in" id="customerDtls" role="tabpanel"
                                 aria-labelledby="customerDtls-tab">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-store">Store</label>
                                    <div class="col-sm-10">
                                        <select name="store_id"  class="form-control">
                                            <option value="0" selected="selected">Default</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-error">
                                    <label class="col-sm-2 control-label" for="input-currency">Currency</label>
                                    <div class="col-sm-10">
                                        <select name="currency" id="input-currency" class="form-control">
                                            <option value="EUR">Euro</option>
                                            <option value="GBP">Pound Sterling</option>
                                            <option value="USD" selected="selected">US Dollar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-customer">Customer</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="customer" value="" placeholder="Customer"
                                               id="input-customer" class="form-control" autocomplete="off">
                                        <ul class="dropdown-menu"></ul>
                                        <input type="hidden" name="customer_id" value="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-customer-group">Customer Group</label>
                                    <div class="col-sm-10">
                                        <select name="customer_group_id" id="input-customer-group" class="form-control">
                                            <option value="1" selected="selected">Default</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="firstname" value="sddc" id="input-firstname"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lastname" value="sdvdsvc" id="input-lastname"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" value="focusbenj@gmail.com" id="input-email"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="telephone" value="08069386824" id="input-telephone"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="button" id="button-customer" data-loading-text="Loading..."
                                            class="btn btn-primary"><i class="fa fa-arrow-right"></i> Continue
                                    </button>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                                Edit products fields
                            </div>
                            <div class="tab-pane fade" id="paymentDtls" role="tabpanel" aria-labelledby="paymentDtls-tab">
                                Edit Payment Details fields
                            </div>
                            <div class="tab-pane fade" id="shippingDtls" role="tabpanel" aria-labelledby="shippingDtls-tab">
                                Edit Shipping Details fields
                            </div>
                            <div class="tab-pane fade" id="totals" role="tabpanel" aria-labelledby="totals-tab">
                                Edit Totals fields
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane tabe-pane--invoice-order fade" id="invoiceOrder" role="tabpanel"
                         aria-labelledby="invoiceOrder-tab">
                        Invoice
                    </div>
                    <div class="tab-pane tabe-pane--management-order fade" id="managementOrder" role="tabpanel"
                         aria-labelledby="managementOrder-tab">
                        managementOrder
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-4 order-main-cnt_right-col">
            <div class="order-notes panel panel-default mb-0">
                {{--@foreach($order->history as $history)--}}
                {{--<div class="order-notes_message {!! $history->color !!}">--}}
                {{--<p>--}}
                {{--on <span class="underlined">11/11/2011</span>--}}
                {{--at <span class="underlined">11:11</span>--}}
                {{--</p>--}}
                {{--<p>--}}
                {{--Status <span class="font-bold">{!! $history->status !!}</span>--}}
                {{--</p>--}}
                {{--@if($history->admin)--}}
                {{--<p>--}}
                {{--order status changed by <span--}}
                {{--class="text-bold">{!! $history->admin->name.' '.$history->admin->last_name !!} </span>--}}
                {{--</p>--}}
                {{--@endif--}}
                {{--</div>--}}
                {{--@endforeach--}}


                <div class="order-notes_timeline">
                    <ul class="list-unstyled order-timeline">
                        @include('admin.orders._partials.timeline_item',['histories' => $order->history()->orderBy('created_at','desc')->get()])
                    </ul>
                </div>
            </div>

            <div class="row order-main-cnt_control-btns">
                <button id="btnAddStatus" class="btn btn-default col-sm-6 btn--add-status"><i class="fa fa-plus" aria-hidden="true"></i> Add Status</button>
                <button id="btnAddNote" class="btn btn-default col-sm-6 btn--add-note"><i class="fa fa-plus" aria-hidden="true"></i> Add Note</button>
            </div>
            <div class="hidden-add-field" id="addStatusField">
                <div class="panel-default hidden-add-field_heading">
                    <p class="panel-heading text-center">Add Status <span class="pull-right"><i class="fa fa-close"></i></span></p>
                </div>
                <div class="hidden-add-field_body">
                    {!! Form::open(['url' =>route('orders_add_note')]) !!}
                        {!! Form::hidden('id',$order->id) !!}
                        <div class="errors"></div>
                        <div class="form-group mb-20 w-100">
                            <label class="col-sm-4 control-label" for="changeStatusSelect">Change status to</label>
                            <div class="col-sm-8">
                                {!! Form::select('status_id',$statuses,null,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ChangeMessage" class="control-label col-sm-4">Message</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('note',null,['class' => 'd-block w-100','rows' => 6]) !!}
                            </div>
                        </div>
                        <div class="confirm-btn-outer" style="padding-left: 15px">
                            {!! Form::submit('Change',['class' => 'btn btn-primary change-status-btn']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="hidden-add-field" id="addNoteField">
                <div class="panel-default hidden-add-field_heading">
                    <p class="panel-heading text-center">Add Note <span class="pull-right"><i class="fa fa-close"></i></span></p>
                </div>
                <div class="hidden-add-field_body">
                    {!! Form::open(['url' =>route('orders_add_note')]) !!}
                        <div class="errors"></div>
                        {!! Form::hidden('id',$order->id) !!}
                        <div class="form-group w-100">
                            <label class="control-label" for="addNoteArea">Add your note</label>
                            {!! Form::textarea('note',null,['class' => 'd-block w-100','rows' => 6]) !!}
                        </div>
                        <div class="confirm-btn-outer">
                            {!! Form::submit('Submit',['class' => 'btn btn-primary change-status-btn']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>


            </div>

        </div>

    </div>


@stop

@section('css')
    <style>
            .content-wrapper {
                min-height: 100%!important;
                height: calc(100vh - 101px);
                overflow: hidden;
            }

            body > .wrapper {
                overflow: hidden;
            }


            body .main-sidebar {
                overflow-y: auto !important;
                overflow-x: hidden !important;
                height: 640px;

            }

            body .main-sidebar::-webkit-scrollbar,
            .order-main-cnt_left-col::-webkit-scrollbar,
            .order-notes::-webkit-scrollbar {
                width: 10px;
            }

            body .main-sidebar::-webkit-scrollbar-track,
            .order-main-cnt_left-col::-webkit-scrollbar-track,
            .order-notes::-webkit-scrollbar-track {
                background: #f1f1f1;
            }


            body .main-sidebar::-webkit-scrollbar-thumb,
            .order-main-cnt_left-col::-webkit-scrollbar-thumb,
            .order-notes::-webkit-scrollbar-thumb {
                background: #888;
            }

            body .main-sidebar::-webkit-scrollbar-thumb:hover,
            .order-main-cnt_left-col::-webkit-scrollbar-thumb:hover,
            .order-notes::-webkit-scrollbar-thumb:hover {
                background: #555;
            }

    </style>
@stop

@section('js')
    <script>
        $(function () {

            $('body').on('click', '.change-status-btn', function (event) {
                event.preventDefault();
                var form = $(this).parents('form:first');
                var data = form.serialize();
                form.find('.errors').html('');
                $.ajax({
                    url: "{!! route('orders_add_note') !!}",
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        if(! data.error) {
                            form[0].reset();
                            $('.hidden-add-field_heading .fa-close').trigger('click');
                            $(".order-timeline").html(data.html);
                        }
                    },
                    error: function (data) {
                        let errors = data.responseJSON.errors;
                        $.map(errors, function (k, v) {
                            form.find('.errors').append(`<p>${k[0]}</p>`);
                        });
                    }
                });
            });

            $('#btnAddStatus').on('click',function(){
                $('#addStatusField').addClass('show');
                $('.order-main-cnt_control-btns').hide();
            });

            $('#btnAddNote').on('click',function(){
                $('#addNoteField').addClass('show');
                $('.order-main-cnt_control-btns').hide();
            });

            $('.hidden-add-field_heading .fa-close').on('click',function(){
                $(this).closest('.hidden-add-field').removeClass('show');
                $('.order-main-cnt_control-btns').show("1000");
            });
        });

    </script>
@stop