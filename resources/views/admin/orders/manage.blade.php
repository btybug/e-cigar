@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix order-panel--header">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <label class="col-md-4">Order Number</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <label class="col-md-4">Customer</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-right">
                        <a href="#" target="_blank" data-toggle="tooltip" title="" class="btn btn-info"
                           data-original-title="Print Invoice"><i class="fa fa-print"></i></a>
                        <a href="#" target="_blank" data-toggle="tooltip" title="" class="btn btn-info"
                           data-original-title="Print Shipping List"><i class="fa fa-truck"></i></a>
                        <a href="#"
                           data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i
                                    class="fa fa-reply"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row order-main-cnt">
                <div class="col-md-12">
                    <div class="order-main-cnt_left-col">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link" id="general-tab" data-toggle="tab" href="#general" role="tab"
                                   aria-controls="general" aria-selected="true" aria-expanded="true">Order Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="invoiceOrder-tab" data-toggle="tab" href="#invoiceOrder"
                                   role="tab"
                                   aria-controls="invoiceOrder" aria-selected="false">Docs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="managementOrder-tab" data-toggle="tab" href="#managementOrder"
                                   role="tab"
                                   aria-controls="managementOrder" aria-selected="false">Collecting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="shippingOrder-tab" data-toggle="tab" href="#shippingOrder"
                                   role="tab"
                                   aria-controls="shippingOrder" aria-selected="false">Shipping</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="log-tabid" data-toggle="tab" href="#log-tab" role="tab"
                                   aria-controls="log-tab" aria-selected="false">Logs</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-content-store-settings">
                            <div class="tab-pane fade active in" id="general" role="tabpanel"
                                 aria-labelledby="general-tab">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Order
                                                    Details</h3>
                                            </div>
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 1%;">
                                                        <button data-toggle="tooltip" title=""
                                                                class="btn btn-info btn-xs"
                                                                data-original-title="Store"><i
                                                                    class="fa fa-shopping-cart fa-fw"></i></button>
                                                    </td>
                                                    <td><a href="https://demo.opencart.com/" target="_blank">Your
                                                            Store</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button data-toggle="tooltip" title=""
                                                                class="btn btn-info btn-xs"
                                                                data-original-title="Date Added"><i
                                                                    class="fa fa-calendar fa-fw"></i></button>
                                                    </td>
                                                    <td>{!! BBgetDateFormat($order->created_at) !!}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button data-toggle="tooltip" title=""
                                                                class="btn btn-info btn-xs"
                                                                data-original-title="Payment Method"><i
                                                                    class="fa fa-credit-card fa-fw"></i></button>
                                                    </td>
                                                    <td>{!! $order->payment_method !!}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <button data-toggle="tooltip" title=""
                                                                class="btn btn-info btn-xs"
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
                                        <div class="details">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="user-img-name">
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRIz-Vq2guLXBClPdqx9lLCN7lrSO_sSirya67ETwY4Zq4gXc9U"
                                                             alt="product">
                                                        <div class="name">User Name</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="tabs-address">
                                                        <ul class="nav nav-tabs">

                                                            <li class="active"><a data-toggle="tab" href="#shipping-address">Shipping
                                                                    address</a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div id="shipping-address" class="tab-pane fade">
                                                                <h3> Shipping address</h3>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="panel panel-default panel--orders-addresses customer-notes">
                                            <div class="panel-heading">Customer Notes</div>
                                            <div class="panel-body">
                                                <div class="wall danger">
                                                    <p><strong>Danger!</strong> Some text...</p>
                                                </div>

                                                <div class="wall success">
                                                    <p><strong>Success!</strong> Some text...</p>
                                                </div>

                                                <div class="wall info">
                                                    <p><strong>Info!</strong> Some text...</p>
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
                                                            $options=(is_array($item->options))?$item->options:[];
                                                                $lastElement = end($options);
                                                        @endphp
                                                        <b>
                                                            @foreach($options as $key=>$option)
                                                                {!! $key !!}: {!! $option !!} @if($option!=$lastElement)
                                                                    , @endif
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
                                                <td class="text-right">
                                                    $@convert($order->amount-$order->shipping_price)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Shipping
                                                    ({!! $order->shipping_method !!})
                                                </td>
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
                            <div class="tab-pane tabe-pane--invoice-order fade" id="invoiceOrder" role="tabpanel"
                                 aria-labelledby="invoiceOrder-tab">
                                <div class="tabbable">
                                    <ul class="nav nav-pills nav-stacked col-md-3">
                                        <li><a href="#invoice-doc" data-toggle="tab">Invoice</a></li>
                                        <li class="active"><a href="#shipping-doc" data-toggle="tab">Shipping label</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content col-md-9">
                                        <div class="tab-pane" id="invoice-doc">

                                        </div>
                                        <div class="tab-pane active" id="shipping-doc">
                                            <div class="col-md-12">
                                                @include('admin.pdf.shipping')
                                            </div>
                                            <div class="col-md-12">
                                                <a href="{{ URL::to('/admin/pdf/order/shipping/'.$order->id) }}">Export
                                                    PDF</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tabe-pane--management-order fade" id="managementOrder" role="tabpanel"
                                 aria-labelledby="managementOrder-tab">

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="table-responsive">
                                            <table class="table table-bordered managmentorder-table">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Qty</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->items as $item)
                                                    <tr>
                                                        <td class="images w-20">
                                                            <div class="image">
                                                                <img src="{{ $item->image }}"
                                                                     alt="">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-name-id">
                                                                <div class="name">{{ $item->name }}</div>
                                                                <div class="product-id">{{ $item->sku }}</div>
                                                                <div class="">
                                                                    @if($item->options && count($item->options))
                                                                        @foreach($item->options as $attribute => $sticker)
                                                                            <p><strong>{{ $attribute }}
                                                                                    : </strong> {{ $sticker }}</p>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td align="center" class="w-6"><span>{{ $item->qty }}</span>
                                                        </td>
                                                        <td align="center" class="w-6">
                                                            <div class="check-product">
                                                                <label class="contains">
                                                                    <input type="checkbox">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="2"><span class="total-items">Total Items</span></td>
                                                    <td>
                                                        <div class="form-control">{{ $order->items()->sum('qty') }}</div>
                                                    </td>

                                                    <td></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="scan-your-item">
                                            <div class="panel panel-default panel-scan">
                                                <div class="panel-heading">Scanned Items</div>
                                                <div class="panel-body">
                                                    <div class="scan">
                                                        <span> Scan your item</span>
                                                    </div>
                                                    <div class="input-wall">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="qty">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                Qty
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="number" class="form-control" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mr-30 managmentorder-table collecting">
                                    <div class="check-product">
                                        <label class="contains">Check as Collecting is complete
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane tabe-pane--shipping-order fade" id="shippingOrder" role="tabpanel"
                                 aria-labelledby="shippingOrder-tab">
                                shipping
                            </div>
                            <div class="tab-pane tabe-pane--log-tab fade" id="log-tab" role="tabpanel"
                                 aria-labelledby="log-tabid">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 order-main-cnt_right-col">
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
                                        <button id="btnAddStatus" class="btn btn-default col-sm-6 btn--add-status"><i
                                                    class="fa fa-plus" aria-hidden="true"></i> Add Status
                                        </button>
                                        <button id="btnAddNote" class="btn btn-default col-sm-6 btn--add-note"><i
                                                    class="fa fa-plus" aria-hidden="true"></i> Add Note
                                        </button>
                                    </div>
                                    <div class="hidden-add-field" id="addStatusField">
                                        <div class="panel-default hidden-add-field_heading">
                                            <p class="panel-heading text-center">Add Status <span class="pull-right"><i
                                                            class="fa fa-close"></i></span></p>
                                        </div>
                                        <div class="hidden-add-field_body">
                                            {!! Form::open(['url' =>route('orders_add_note')]) !!}
                                            {!! Form::hidden('id',$order->id) !!}
                                            <div class="errors"></div>
                                            <div class="form-group mb-20 w-100">
                                                <label class="col-sm-4 control-label" for="changeStatusSelect">Change
                                                    status to</label>
                                                <div class="col-sm-8">
                                                    {!! Form::select('status_id',$statuses,null,['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="ChangeMessage"
                                                       class="control-label col-sm-4">Message</label>
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
                                            <p class="panel-heading text-center">Add Note <span class="pull-right"><i
                                                            class="fa fa-close"></i></span></p>
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
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>





@stop

@section('css')
    <style>
        .tabe-pane--management-order .mr-30 {
            margin-right: 100px;
            margin-top: 50px;
        }

        .managmentorder-table.collecting .check-product {
            display: inline-block;
        }

        .scan-your-item .panel-scan .scan {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
        }

        .scan-your-item .panel-scan .qty {
            width: 70%;
            margin: 15px auto;
        }

        .tab-content-store-settings .customer-notes .wall {
            margin-bottom: 15px;
            padding: 4px 12px;
        }

        .tab-content-store-settings .customer-notes .wall.danger {
            background-color: #ffdddd;
            border-left: 6px solid #f44336;
        }

        .tab-content-store-settings .customer-notes .wall.success {
            background-color: #ddffdd;
            border-left: 6px solid #4CAF50;
        }

        .tab-content-store-settings .customer-notes .wall.info {
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
        }

        .tab-content-store-settings .details {
            margin-bottom: 20px;
        }

        .tab-content-store-settings .details .user-img-name {
            border: 1px solid #28618373;
            box-shadow: 0 0 4px #28618385;
        }

        .tab-content-store-settings .details .user-img-name img {
            width: 100%;
            height: 145px;
            object-fit: cover;
        }

        .tab-content-store-settings .details .user-img-name .name {
            padding: 15px 20px;
            border-top: 1px solid #28618385;
            text-align: center;
            font-weight: bold;
            background-color: #61747fe3;
            color: white;
        }

        .tab-content-store-settings .details .tabs-address {

        }

        .tab-content-store-settings .details .tabs-address .nav {
            display: flex;
        }

        .tab-content-store-settings .details .tabs-address .nav > li a {
            padding: 10px;
            text-align: center;
            color: black;
            font-size: 16px;
            border-radius: 0;
        }

        .tab-content-store-settings .details .tabs-address .nav > li {
            flex: auto;
        }

        .tab-content-store-settings .details .tabs-address .nav > li.active a {
            background-color: #3c8dbc;
            color: white;
        }

        .managmentorder-table tr td:not(.images) {
            vertical-align: middle;
        }

        .managmentorder-table .w-6 {
            width: 6%;
        }

        .managmentorder-table .w-20 {
            width: 20%;
        }

        .managmentorder-table tr .images .image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ccc;
        }

        .managmentorder-table .check-product {
            display: inherit;
        }

        .managmentorder-table .check-product .contains {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 25px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .managmentorder-table .check-product .contains input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .managmentorder-table .check-product .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .managmentorder-table .check-product .contains:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .managmentorder-table .check-product .contains input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .managmentorder-table .check-product .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .managmentorder-table .check-product .contains input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .managmentorder-table .check-product .contains .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .content-wrapper {
            min-height: 100% !important;
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
                        if (!data.error) {
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

            $('#btnAddStatus').on('click', function () {
                $('#addStatusField').addClass('show');
                $('.order-main-cnt_control-btns').hide();
            });

            $('#btnAddNote').on('click', function () {
                $('#addNoteField').addClass('show');
                $('.order-main-cnt_control-btns').hide();
            });

            $('.hidden-add-field_heading .fa-close').on('click', function () {
                $(this).closest('.hidden-add-field').removeClass('show');
                $('.order-main-cnt_control-btns').show("1000");
            });
        });

    </script>
@stop