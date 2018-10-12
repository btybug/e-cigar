@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
                {{--@include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_orders'])--}}
            {{--</div>--}}
            {{--<div class="col-md-8">--}}

            {{--</div>--}}
        {{--</div>--}}

        <table class="table table-bordered table-striped table-responsive-md order-table">
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
            <tr>
                <td>#4949</td>
                <td>12/10/09</td>
                <td>5</td>
                <td>36$</td>
                <td>
                    <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                </td>
                <td>
                    <div class="mb-2">
                        <button type="button" class="btn btn-dark order-table_btn">View</button></div>
                    <div>
                        <button type="button" class="btn btn-warning order-table_btn">Purchase</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>#4949</td>
                <td>12/10/09</td>
                <td>5</td>
                <td>36$</td>
                <td>
                    <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                </td>
                <td>
                    <div class="mb-2">
                        <button type="button" class="btn btn-dark order-table_btn">View</button></div>
                    <div>
                        <button type="button" class="btn btn-warning order-table_btn">Purchase</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>#4949</td>
                <td>12/10/09</td>
                <td>5</td>
                <td>36$</td>
                <td>
                    <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                </td>
                <td>
                    <div class="mb-2">
                        <button type="button" class="btn btn-dark order-table_btn">View</button></div>
                    <div>
                        <button type="button" class="btn btn-warning order-table_btn">Purchase</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>#4949</td>
                <td>12/10/09</td>
                <td>5</td>
                <td>36$</td>
                <td>
                    <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                </td>
                <td>
                    <div class="mb-2">
                        <button type="button" class="btn btn-dark order-table_btn">View</button></div>
                    <div>
                        <button type="button" class="btn btn-warning order-table_btn">Purchase</button>
                    </div>
                </td>
            </tr>

            </tbody>
        </table>

    </div>
@stop