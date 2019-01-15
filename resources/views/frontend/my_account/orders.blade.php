@extends('layouts.frontend')
@section('content')
    <main class="page-main-content">
        <div class="d-flex h-100">
            @include('frontend._partials.left_bar')
            <div class="main-right-wrapp">
                <div class="container mt-5">
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
                            {{--{{ dd($order->history->first()->status->name) }}--}}
                            {{--{{ dd($order->history->first()->toArray()) }}--}}
                            <tr>
                                <td>#4949</td>
                                <td>{!! BBgetDateFormat($order->created_at).' '.BBgetTimeFormat($order->created_at)  !!}</td>
                                <td>{!! $order->items->count() !!}</td>
                                <td>@convert($order->amount)$</td>
                                <td>
                                    @if($order->history->first()['status']['name'])
                                        <button type="button"
                                                class="btn order-table_btn order-table_btn--status" style="background: {!! $order->history->first()['status']['color'] !!}">
                                            {!! $order->history->first()->status->name !!}
                                            {{--{!! $order->history->first()['status']['name'] !!}--}}
                                        </button>
                                    @else
                                        No Status
                                    @endif
                                </td>
                                <td>
                                    <div class="mb-2">
                                        <a href="{!! route('my_account_order_invoice',$order->id) !!}"
                                           class="btn btn-dark order-table_btn">View</a>
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
            @include('frontend.my_account._partials.verify_bar')

        </div>
    </main>
@stop