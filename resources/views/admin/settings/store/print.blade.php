@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
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
            <li class="nav-item ">
                <a class="nav-link active" id="printing-tab" href="{!! route('admin_settings_printing') !!}" role="tab"
                   aria-controls="printing" aria-selected="true" aria-expanded="true">Printing</a>
            </li>
        </ul>
        <div class="tab-content">
            {!! Form::model($model,['class'=>'form-horizontal']) !!}
            <div>

                <div class="card panel panel-default mb-3">
                    <div class="card-header panel-heading">Printers</div>
                    <div class="card-body panel-body">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr class="bg-info text-white">
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Folder</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="currency-list">
                                    {{--@foreach($siteCurrencies as $key => $currency)--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--{!! Form::text("printers[$key][name]",null,['class'=>'form-control']) !!}--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--{!! Form::text("printers[$key][id]",null,['class'=>'form-control']) !!}--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--{!! Form::select("printers[$key][folder]",[],null,['class'=>'form-control']) !!}--}}
                                            {{--</td>--}}

                                            {{--<td class="text-right w-5">--}}
                                                {{--<button type="button" class="btn btn-danger btn-sm remove-row"><i class="fa fa-minus"></i></button>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="7" class="text-right">
                                            <button type="button" class="btn btn-info btn-sm " id="add-more-currency"><i
                                                        class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                    </tfoot>

                                </table>
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
                {!! Form::text("printers[{id}][name]",null,['class'=>'form-control']) !!}
            </td>
            <td>
                {!! Form::text("printers[{id}][id]",null,['class'=>'form-control']) !!}
            </td>
            <td>
                {!! Form::select("printers[{id}][folder]",[],null,['class'=>'form-control']) !!}
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
            function makeid() {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 9; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }

//            $('.default-currency').on('change', function () {
//                let value = $(this).val();
//                window.location.href='?p='+value;
//            })
            $('#add-more-currency').on('click', function () {
                let unqiueID = makeid();
                let html = $('#currency_row').html();
                html=html.replace(/{id}/g,unqiueID);
                $('#currency-list').append(html);
            });
            $('body').on('click', '.remove-row', function () {
                $(this).closest('tr').remove();
            });

            $('body').on('click', '.get-live-rate' ,function () {
                let code = $(this).data('code');
                let parent = $(this).closest('tr');

                $.ajax({
                    type: "post",
                    url: "/admin/settings/store/general/currency-get-live",
                    cache: false,
                    datatype: "json",
                    data: {
                        code: code
                    },
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            parent.find('.c-rate').val(data.rate)
                        }else{
                            alert('NO live data with this code');
                        }
                    }
                });
            });

            $("body").on('change','.c-code',function () {
                let code = $(this).val();
                let parent = $(this).closest('tr');
                $.ajax({
                    type: "post",
                    url: "/admin/settings/store/general/currency-data",
                    cache: false,
                    datatype: "json",
                    data: {
                        code: code
                    },
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            parent.find('.c-name').val(data.data.name)
                            parent.find('.c-symbol').val(data.data.symbol)
                            parent.find('.c-rate').val(data.data.rate)
                            parent.find('.c-default').val(data.data.currency)
                            parent.find('.get-live-rate').data('code',data.data.currency)
                        }
                    }
                });
            });


        })
    </script>

@stop
