@extends('layouts.frontend')
@section('content')
    <main class="main-content position-relative">
        <div class="d-flex">
            {{--@include('frontend._partials.left_bar')--}}

            {{--acoount sidebar--}}
            <div class="profile-sidebar profile-sidebar--inner-pages d-flex flex-column align-items-center">
                @include('frontend.my_account._partials.left_bar')
                <div class="mt-auto">
                    {!! Form::open(['url'=>route('logout')]) !!}
                    <div class="text-center">
                        <button type="submit" class="profile-sidebar_logout-btn d-inline-flex align-items-center justify-content-center font-14 text-uppercase text-white pointer">Logout</button>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
            <div class="profile-inner-pg-right-cnt">
                <div class="profile-inner-pg-right-cnt_inner h-100">
                    <div class="row flex-lg-row flex-column-reverse">
                        <div class="col-lg-9">
                            <table class="table-ntfs table table-bordered table-striped table-responsive-lg order-table">
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
                                                        class="btn order-table_btn order-table_btn--status text-sec-clr rounded-0" style="background: {!! $order->history->first()['status']['color'] !!}">
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
                                                   class="btn ntfs-btn text-sec-clr order-table_btn rounded-0">View</a>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-transp order-table_btn rounded-0">Purchase</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{--@include('frontend.my_account._partials.verify_bar.blade_old.php')--}}

        </div>
    </main>
@stop