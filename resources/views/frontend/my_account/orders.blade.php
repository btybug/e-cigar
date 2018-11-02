@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_orders'])
            </div>
            <div class="col-md-8">
                <table class="table table-bordered table-striped table-responsive-lg order-table">
                    <thead>
                    <tr>
                        <th class="text-capitalize">order number</th>
                        <th class="text-capitalize">Order date</th>
                        <th class="text-capitalize">number of products</th>
                        <th class="text-capitalize">Total amount</th>
                        <th class="text-capitalize">status</th>
                        <th class="text-capitalize">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->orders as $order)
                        <tr>
                            <td>#4949</td>
                            <td>{!! BBgetDateFormat($order->created_at).' '.BBgetTimeFormat($order->created_at)  !!}</td>
                            <td>{!! $order->items->count() !!}</td>
                            <td>@convert($order->amount)$</td>
                            <td>
                                <button type="button" class="btn btn-success {!! $order->history->last()->color !!} order-table_btn order-table_btn--status">
                                    {!! $order->history->last()->status !!}
                                </button>
                            </td>
                            <td>
                                <div class="mb-2">
                                    <a href="{!! route('my_account_order_invoice',$order->id) !!}" class="btn btn-dark order-table_btn">View</a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-warning order-table_btn">Purchase</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop