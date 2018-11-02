@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_tickets'])
            </div>
            <div class="col-md-8">
                <table class="table table-bordered table-striped table-responsive-lg order-table">
                    <thead>
                    <tr>
                        <th class="text-capitalize">order number</th>
                        <th class="text-capitalize">ticket ID</th>
                        <th class="text-capitalize">updated on</th>
                        <th class="text-capitalize">status</th>
                        <th class="text-capitalize">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>#4949</td>
                        <td>12/10/09</td>
                        <td>13/10/09</td>
                        <td>
                            <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                        </td>
                        <td>
                            <div class="mb-2">
                                <button type="button" class="btn btn-dark order-table_btn">View</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#4949</td>
                        <td>12/10/09</td>
                        <td>13/10/09</td>
                        <td>
                            <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                        </td>
                        <td>
                            <div class="mb-2">
                                <button type="button" class="btn btn-dark order-table_btn">View</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#4949</td>
                        <td>12/10/09</td>
                        <td>13/10/09</td>
                        <td>
                            <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                        </td>
                        <td>
                            <div class="mb-2">
                                <button type="button" class="btn btn-dark order-table_btn">View</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#4949</td>
                        <td>12/10/09</td>
                        <td>13/10/09</td>
                        <td>
                            <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                        </td>
                        <td>
                            <div class="mb-2">
                                <button type="button" class="btn btn-dark order-table_btn">View</button>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

@stop