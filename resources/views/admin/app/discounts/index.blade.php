@extends('layouts.admin',['activePage'=>'discounts'])
@section('content')
        <div class="card">
            <div class="card-header card-header-tabs card-header-warning">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Discounts:</span>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="{!! route("app_customer_discounts") !!}">
                                    Admin discounts
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{!! route("app_customer_offers") !!}">
                                    Offers
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                        <a class="pull-right btn btn-primary" href="{!! route('app_customer_discounts_create') !!}">Create
                            new</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Created Date
                                </th>
                                <th>
                                    Actions
                                </th>
                                </thead>
                                <tbody>
                                @foreach($discounts as $discount)
                                    <tr>
                                        <td>
                                            {!! $discount->name !!}
                                        </td>
                                        <td>
                                            @if($discount->type) Fixed Amount @else Percentage @endif
                                        </td>
                                        <td>
                                            {!! $discount->amount !!}
                                        </td>
                                        <td>
                                            {!! $discount->created_at !!}
                                        </td>

                                        <td>
                                            <a href="{!! route('app_customer_discounts_edit',$discount->id) !!}"
                                               class="mr-3 table-edit-link">Edit</a>
                                            <a href="#" class="mr-3 table-edit-link">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop